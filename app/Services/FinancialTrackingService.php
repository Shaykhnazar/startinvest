<?php

namespace App\Services;

use App\Models\Investment;
use App\Models\InvestmentRound;
use App\Models\InvestmentStage;
use App\Models\Startup;
use App\Models\User;
use App\Models\PortfolioTracking;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class FinancialTrackingService
{
    public function createInvestmentRound(Startup $startup, array $data): InvestmentRound
    {
        return DB::transaction(function () use ($startup, $data) {
            // Validate stage exists
            if (isset($data['stage_id'])) {
                $stage = InvestmentStage::find($data['stage_id']);
                if (!$stage) {
                    throw new \Exception('Invalid investment stage');
                }
                
                // Validate amount is appropriate for stage
                if (isset($data['target_amount']) && !$stage->isAppropriateForAmount($data['target_amount'])) {
                    throw new \Exception("Target amount is not appropriate for {$stage->name} stage");
                }
            }

            // Create the investment round
            $round = $startup->investmentRounds()->create(array_merge($data, [
                'status' => 'draft',
                'raised_amount' => 0
            ]));

            // Auto-calculate post-money valuation if pre-money and target amount provided
            if ($round->pre_money_valuation && $round->target_amount) {
                $round->post_money_valuation = $round->pre_money_valuation + $round->target_amount;
                $round->save();
            }

            return $round;
        });
    }

    public function launchInvestmentRound(InvestmentRound $round): InvestmentRound
    {
        if ($round->status !== 'draft') {
            throw new \Exception('Only draft rounds can be launched');
        }

        // Validate required fields
        $this->validateRoundForLaunch($round);

        $round->update([
            'status' => 'active',
            'launched_at' => now()
        ]);

        // Create launch update
        $round->updates()->create([
            'title' => 'Investment Round Launched',
            'content' => "New {$round->round_type} round launched with target of {$round->formatted_target_amount}",
            'type' => 'announcement',
            'is_public' => true
        ]);

        return $round->fresh();
    }

    public function processInvestment(InvestmentRound $round, User $investor, float $amount, array $additionalData = []): Investment
    {
        return DB::transaction(function () use ($round, $investor, $amount, $additionalData) {
            // Validate investment
            if (!$round->canAcceptInvestments()) {
                throw new \Exception('This round is not accepting investments');
            }

            if ($amount < $round->min_investment) {
                throw new \Exception("Minimum investment is {$round->formatted_min_investment}");
            }

            if ($round->max_investment && $amount > $round->max_investment) {
                throw new \Exception("Maximum investment is {$round->formatted_max_investment}");
            }

            // Check if investor already invested in this round
            $existingInvestment = $round->investments()
                ->where('investor_id', $investor->id)
                ->where('status', '!=', 'cancelled')
                ->first();

            if ($existingInvestment) {
                throw new \Exception('You have already invested in this round');
            }

            // Calculate equity percentage if price per share is set
            $equityPercentage = null;
            if ($round->price_per_share && $round->total_shares) {
                $sharesReceived = $amount / $round->price_per_share;
                $equityPercentage = ($sharesReceived / $round->total_shares) * 100;
            }

            // Create investment
            $investment = $round->investments()->create(array_merge([
                'startup_id' => $round->startup_id,
                'investor_id' => $investor->id,
                'investment_stage_id' => $round->stage_id,
                'investment_round_id' => $round->id,
                'amount' => $amount,
                'equity_percentage' => $equityPercentage,
                'status' => 'pending',
                'invested_at' => now()
            ], $additionalData));

            // Create portfolio tracking entry
            $this->createPortfolioTracking($investment);

            // Update round raised amount
            $round->updateRaisedAmount();

            return $investment;
        });
    }

    public function confirmInvestment(Investment $investment): Investment
    {
        return DB::transaction(function () use ($investment) {
            $investment->update([
                'status' => 'confirmed',
                'confirmed_at' => now()
            ]);

            // Update portfolio tracking
            $this->updatePortfolioTracking($investment);

            // Update round statistics
            $investment->investmentRound?->updateRaisedAmount();

            // Send confirmation notification (would be implemented)
            // $this->notificationService->sendInvestmentConfirmation($investment);

            return $investment->fresh();
        });
    }

    public function calculateROI(Investment $investment): array
    {
        $tracking = $investment->portfolioTracking;
        
        if (!$tracking) {
            return [
                'current_roi' => 0,
                'paper_return' => 0,
                'realized_return' => 0,
                'total_return' => 0,
                'multiple' => 1.0
            ];
        }

        $initialInvestment = $investment->amount;
        $currentValuation = $tracking->current_valuation ?? $initialInvestment;
        $realizedReturn = $tracking->realized_return ?? 0;
        $totalReturn = $currentValuation + $realizedReturn;
        $paperReturn = $currentValuation - $initialInvestment;

        $roi = $initialInvestment > 0 ? (($totalReturn - $initialInvestment) / $initialInvestment) * 100 : 0;
        $multiple = $initialInvestment > 0 ? $totalReturn / $initialInvestment : 1.0;

        return [
            'current_roi' => round($roi, 2),
            'paper_return' => $paperReturn,
            'realized_return' => $realizedReturn,
            'total_return' => $totalReturn,
            'multiple' => round($multiple, 2),
            'initial_investment' => $initialInvestment,
            'current_valuation' => $currentValuation
        ];
    }

    public function getPortfolioSummary(User $investor): array
    {
        $investments = $investor->investments()->with(['startup', 'investmentRound', 'portfolioTracking'])->get();
        
        if ($investments->isEmpty()) {
            return $this->getEmptyPortfolioSummary();
        }

        $totalInvested = $investments->sum('amount');
        $currentValue = 0;
        $totalReturns = 0;
        $activeInvestments = 0;
        $successfulExits = 0;
        $portfolioROI = 0;

        foreach ($investments as $investment) {
            $roi = $this->calculateROI($investment);
            $currentValue += $roi['current_valuation'];
            $totalReturns += $roi['realized_return'];
            
            if ($investment->status === 'active') {
                $activeInvestments++;
            }
            
            if (in_array($investment->status, ['successful', 'exited'])) {
                $successfulExits++;
            }
        }

        $portfolioROI = $totalInvested > 0 ? (($currentValue + $totalReturns - $totalInvested) / $totalInvested) * 100 : 0;

        return [
            'total_investments' => $investments->count(),
            'total_invested' => $totalInvested,
            'current_portfolio_value' => $currentValue,
            'total_returns' => $totalReturns,
            'unrealized_gains' => $currentValue - $totalInvested,
            'portfolio_roi' => round($portfolioROI, 2),
            'active_investments' => $activeInvestments,
            'successful_exits' => $successfulExits,
            'average_investment_size' => $totalInvested / $investments->count(),
            'best_performing_investment' => $this->getBestPerformingInvestment($investments),
            'worst_performing_investment' => $this->getWorstPerformingInvestment($investments),
            'industry_breakdown' => $this->getIndustryBreakdown($investments),
            'stage_breakdown' => $this->getStageBreakdown($investments)
        ];
    }

    public function getStartupFinancialSummary(Startup $startup): array
    {
        $rounds = $startup->investmentRounds()->with('investments')->get();
        $investments = $startup->investments()->with('investor')->get();
        
        $totalRaised = $investments->whereIn('status', ['confirmed', 'active'])->sum('amount');
        $totalInvestors = $investments->pluck('investor_id')->unique()->count();
        $averageInvestmentSize = $investments->whereIn('status', ['confirmed', 'active'])->avg('amount') ?? 0;
        
        $roundsData = $rounds->map(function ($round) {
            return [
                'round_name' => $round->name,
                'round_type' => $round->round_type,
                'target_amount' => $round->target_amount,
                'raised_amount' => $round->raised_amount,
                'progress_percentage' => $round->progress_percentage,
                'investors_count' => $round->investors_count,
                'status' => $round->status,
                'launched_at' => $round->launched_at,
                'deadline' => $round->deadline
            ];
        });

        return [
            'total_raised' => $totalRaised,
            'total_investors' => $totalInvestors,
            'average_investment_size' => $averageInvestmentSize,
            'funding_rounds_count' => $rounds->count(),
            'active_rounds_count' => $rounds->where('status', 'active')->count(),
            'successful_rounds_count' => $rounds->where('status', 'successful')->count(),
            'current_valuation' => $startup->current_valuation ?? 0,
            'funding_rounds' => $roundsData,
            'largest_investment' => $investments->max('amount') ?? 0,
            'most_recent_round' => $rounds->sortByDesc('launched_at')->first(),
            'funding_progress' => $this->calculateFundingProgress($startup),
            'investor_breakdown' => $this->getInvestorBreakdown($investments)
        ];
    }

    public function updateMarketValuation(Investment $investment, float $newValuation, string $reason = null): void
    {
        DB::transaction(function () use ($investment, $newValuation, $reason) {
            $tracking = $investment->portfolioTracking;
            
            if (!$tracking) {
                $this->createPortfolioTracking($investment);
                $tracking = $investment->portfolioTracking()->first();
            }

            $oldValuation = $tracking->current_valuation;
            
            $tracking->update([
                'current_valuation' => $newValuation,
                'last_valuation_date' => now(),
                'roi_percentage' => $this->calculateROI($investment)['current_roi']
            ]);

            // Log the valuation change
            $updateHistory = $tracking->update_history ?? [];
            $updateHistory[] = [
                'type' => 'valuation_update',
                'data' => [
                    'old_valuation' => $oldValuation,
                    'new_valuation' => $newValuation,
                    'change_amount' => $newValuation - $oldValuation,
                    'change_percentage' => $oldValuation > 0 ? (($newValuation - $oldValuation) / $oldValuation) * 100 : 0,
                    'reason' => $reason
                ],
                'timestamp' => now()->toISOString()
            ];
            
            $tracking->update(['update_history' => $updateHistory]);
        });
    }

    protected function validateRoundForLaunch(InvestmentRound $round): void
    {
        $required = ['name', 'target_amount', 'min_investment'];
        $missing = [];

        foreach ($required as $field) {
            if (empty($round->{$field})) {
                $missing[] = $field;
            }
        }

        if (!empty($missing)) {
            throw new \Exception('Missing required fields: ' . implode(', ', $missing));
        }

        if ($round->deadline && $round->deadline->isPast()) {
            throw new \Exception('Cannot launch a round with a past deadline');
        }
    }

    protected function createPortfolioTracking(Investment $investment): PortfolioTracking
    {
        return PortfolioTracking::create([
            'investor_id' => $investment->investor_id,
            'startup_id' => $investment->startup_id,
            'investment_id' => $investment->id,
            'initial_investment' => $investment->amount,
            'current_valuation' => $investment->amount, // Start at investment amount
            'equity_percentage' => $investment->equity_percentage,
            'investment_date' => $investment->invested_at,
            'investment_stage' => $investment->investmentStage?->slug ?? 'unknown',
            'current_status' => $investment->status,
            'roi_percentage' => 0,
            'risk_score' => 5 // Medium risk baseline
        ]);
    }

    protected function updatePortfolioTracking(Investment $investment): void
    {
        $tracking = $investment->portfolioTracking;
        
        if ($tracking) {
            $tracking->update([
                'current_status' => $investment->status,
                'roi_percentage' => $this->calculateROI($investment)['current_roi']
            ]);
        }
    }

    protected function getBestPerformingInvestment(Collection $investments)
    {
        $best = null;
        $bestROI = -999999;

        foreach ($investments as $investment) {
            $roi = $this->calculateROI($investment);
            if ($roi['current_roi'] > $bestROI) {
                $bestROI = $roi['current_roi'];
                $best = [
                    'startup_name' => $investment->startup?->name,
                    'amount_invested' => $investment->amount,
                    'current_roi' => $roi['current_roi'],
                    'total_return' => $roi['total_return']
                ];
            }
        }

        return $best;
    }

    protected function getWorstPerformingInvestment(Collection $investments)
    {
        $worst = null;
        $worstROI = 999999;

        foreach ($investments as $investment) {
            $roi = $this->calculateROI($investment);
            if ($roi['current_roi'] < $worstROI) {
                $worstROI = $roi['current_roi'];
                $worst = [
                    'startup_name' => $investment->startup?->name,
                    'amount_invested' => $investment->amount,
                    'current_roi' => $roi['current_roi'],
                    'total_return' => $roi['total_return']
                ];
            }
        }

        return $worst;
    }

    protected function getIndustryBreakdown(Collection $investments): array
    {
        return $investments->groupBy('startup.industry')
            ->map(function ($group, $industry) {
                return [
                    'industry' => $industry ?? 'Unknown',
                    'count' => $group->count(),
                    'total_invested' => $group->sum('amount'),
                    'percentage' => 0 // Will be calculated by frontend
                ];
            })
            ->values()
            ->toArray();
    }

    protected function getStageBreakdown(Collection $investments): array
    {
        return $investments->groupBy('investmentStage.name')
            ->map(function ($group, $stage) {
                return [
                    'stage' => $stage ?? 'Unknown',
                    'count' => $group->count(),
                    'total_invested' => $group->sum('amount'),
                    'percentage' => 0 // Will be calculated by frontend
                ];
            })
            ->values()
            ->toArray();
    }

    protected function getInvestorBreakdown(Collection $investments): array
    {
        return $investments->groupBy('investor.name')
            ->map(function ($group, $investorName) {
                return [
                    'investor_name' => $investorName ?? 'Unknown',
                    'total_invested' => $group->sum('amount'),
                    'investment_count' => $group->count(),
                    'average_investment' => $group->avg('amount')
                ];
            })
            ->sortByDesc('total_invested')
            ->values()
            ->toArray();
    }

    protected function calculateFundingProgress(Startup $startup): array
    {
        $fundingGoal = $startup->funding_goal ?? 0;
        $totalRaised = $startup->investments()->whereIn('status', ['confirmed', 'active'])->sum('amount');
        
        return [
            'funding_goal' => $fundingGoal,
            'total_raised' => $totalRaised,
            'percentage_raised' => $fundingGoal > 0 ? ($totalRaised / $fundingGoal) * 100 : 0,
            'remaining_amount' => max(0, $fundingGoal - $totalRaised)
        ];
    }

    protected function getEmptyPortfolioSummary(): array
    {
        return [
            'total_investments' => 0,
            'total_invested' => 0,
            'current_portfolio_value' => 0,
            'total_returns' => 0,
            'unrealized_gains' => 0,
            'portfolio_roi' => 0,
            'active_investments' => 0,
            'successful_exits' => 0,
            'average_investment_size' => 0,
            'best_performing_investment' => null,
            'worst_performing_investment' => null,
            'industry_breakdown' => [],
            'stage_breakdown' => []
        ];
    }

    // Market data and analytics methods
    public function getMarketTrends(): array
    {
        // Mock implementation - would integrate with real market data
        return [
            'total_platform_volume' => $this->getTotalPlatformVolume(),
            'trending_industries' => $this->getTrendingIndustries(),
            'popular_stages' => $this->getPopularStages(),
            'average_round_size' => $this->getAverageRoundSize(),
            'success_rates_by_stage' => $this->getSuccessRatesByStage(),
            'monthly_investment_volume' => $this->getMonthlyInvestmentVolume()
        ];
    }

    protected function getTotalPlatformVolume(): float
    {
        return Investment::whereIn('status', ['confirmed', 'active', 'successful'])->sum('amount');
    }

    protected function getTrendingIndustries(): array
    {
        return Investment::join('startups', 'investments.startup_id', '=', 'startups.id')
            ->where('investments.created_at', '>=', now()->subMonths(3))
            ->where('investments.status', '!=', 'cancelled')
            ->groupBy('startups.industry')
            ->selectRaw('startups.industry, COUNT(*) as investment_count, SUM(investments.amount) as total_amount')
            ->orderByDesc('investment_count')
            ->limit(5)
            ->get()
            ->toArray();
    }

    protected function getPopularStages(): array
    {
        return InvestmentStage::withCount(['investments' => function ($query) {
            $query->where('created_at', '>=', now()->subMonths(3));
        }])
            ->orderByDesc('investments_count')
            ->limit(5)
            ->get(['name', 'investments_count'])
            ->toArray();
    }

    protected function getAverageRoundSize(): float
    {
        return InvestmentRound::where('created_at', '>=', now()->subMonths(6))
            ->avg('target_amount') ?? 0;
    }

    protected function getSuccessRatesByStage(): array
    {
        return InvestmentStage::with(['investments' => function ($query) {
            $query->select('investment_stage_id', 'status');
        }])
            ->get()
            ->map(function ($stage) {
                $total = $stage->investments->count();
                $successful = $stage->investments->whereIn('status', ['successful', 'exited'])->count();
                
                return [
                    'stage' => $stage->name,
                    'success_rate' => $total > 0 ? ($successful / $total) * 100 : 0
                ];
            })
            ->toArray();
    }

    protected function getMonthlyInvestmentVolume(): array
    {
        return Investment::where('created_at', '>=', now()->subYear())
            ->whereIn('status', ['confirmed', 'active', 'successful'])
            ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(amount) as volume, COUNT(*) as count')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                return [
                    'period' => sprintf('%04d-%02d', $item->year, $item->month),
                    'volume' => $item->volume,
                    'count' => $item->count
                ];
            })
            ->toArray();
    }
}