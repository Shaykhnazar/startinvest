<?php

namespace App\Services;

use App\Models\User;
use App\Models\Startup;
use App\Models\Investment;
use App\Models\InvestmentRound;
use App\Models\InvestmentStage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class AnalyticsService
{
    public function getPlatformOverview(): array
    {
        return Cache::remember('platform_overview', 3600, function () {
            return [
                'total_users' => User::count(),
                'total_investors' => User::where('is_investor', true)->count(),
                'total_startups' => Startup::count(),
                'active_startups' => Startup::whereHas('investmentRounds', function ($q) {
                    $q->where('status', 'active');
                })->count(),
                'total_investment_rounds' => InvestmentRound::count(),
                'active_investment_rounds' => InvestmentRound::where('status', 'active')->count(),
                'total_investments' => Investment::count(),
                'total_investment_volume' => Investment::whereIn('status', ['confirmed', 'active'])->sum('amount'),
                'average_investment_size' => Investment::whereIn('status', ['confirmed', 'active'])->avg('amount'),
                'successful_rounds' => InvestmentRound::where('status', 'successful')->count(),
                'platform_success_rate' => $this->calculatePlatformSuccessRate()
            ];
        });
    }

    public function getInvestmentTrends(int $months = 12): array
    {
        $trends = Investment::where('created_at', '>=', now()->subMonths($months))
            ->whereIn('status', ['confirmed', 'active'])
            ->selectRaw('
                YEAR(created_at) as year,
                MONTH(created_at) as month,
                COUNT(*) as investment_count,
                SUM(amount) as total_amount,
                AVG(amount) as average_amount
            ')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        return $trends->map(function ($trend) {
            return [
                'period' => sprintf('%04d-%02d', $trend->year, $trend->month),
                'investment_count' => $trend->investment_count,
                'total_amount' => $trend->total_amount,
                'average_amount' => $trend->average_amount,
                'formatted_total' => $this->formatCurrency($trend->total_amount),
                'formatted_average' => $this->formatCurrency($trend->average_amount)
            ];
        })->toArray();
    }

    public function getIndustryAnalytics(): array
    {
        return Cache::remember('industry_analytics', 1800, function () {
            $industryData = Investment::join('startups', 'investments.startup_id', '=', 'startups.id')
                ->where('investments.status', '!=', 'cancelled')
                ->groupBy('startups.industry')
                ->selectRaw('
                    startups.industry,
                    COUNT(DISTINCT investments.startup_id) as startup_count,
                    COUNT(investments.id) as investment_count,
                    SUM(investments.amount) as total_investment,
                    AVG(investments.amount) as average_investment,
                    COUNT(DISTINCT investments.investor_id) as unique_investors
                ')
                ->orderByDesc('total_investment')
                ->get();

            $totalInvestment = $industryData->sum('total_investment');

            return $industryData->map(function ($industry) use ($totalInvestment) {
                return [
                    'industry' => $industry->industry ?: 'Unknown',
                    'startup_count' => $industry->startup_count,
                    'investment_count' => $industry->investment_count,
                    'total_investment' => $industry->total_investment,
                    'average_investment' => $industry->average_investment,
                    'unique_investors' => $industry->unique_investors,
                    'market_share' => $totalInvestment > 0 ? ($industry->total_investment / $totalInvestment) * 100 : 0,
                    'formatted_total' => $this->formatCurrency($industry->total_investment),
                    'formatted_average' => $this->formatCurrency($industry->average_investment)
                ];
            })->toArray();
        });
    }

    public function getStageAnalytics(): array
    {
        return Cache::remember('stage_analytics', 1800, function () {
            $stageData = InvestmentStage::withCount(['investments as active_investments_count' => function ($query) {
                $query->where('status', 'active');
            }])
                ->with(['investments' => function ($query) {
                    $query->select('investment_stage_id', 'amount', 'status');
                }])
                ->orderBy('order_index')
                ->get();

            return $stageData->map(function ($stage) {
                $totalInvestments = $stage->investments->count();
                $successfulInvestments = $stage->investments->whereIn('status', ['successful', 'exited'])->count();
                $totalAmount = $stage->investments->sum('amount');

                return [
                    'stage_name' => $stage->name,
                    'stage_slug' => $stage->slug,
                    'total_investments' => $totalInvestments,
                    'active_investments' => $stage->active_investments_count,
                    'successful_investments' => $successfulInvestments,
                    'success_rate' => $totalInvestments > 0 ? ($successfulInvestments / $totalInvestments) * 100 : 0,
                    'total_amount' => $totalAmount,
                    'average_amount' => $totalInvestments > 0 ? $totalAmount / $totalInvestments : 0,
                    'funding_range_min' => $stage->min_funding_amount,
                    'funding_range_max' => $stage->max_funding_amount,
                    'risk_level' => $stage->risk_level,
                    'formatted_total' => $this->formatCurrency($totalAmount)
                ];
            })->toArray();
        });
    }

    public function getInvestorAnalytics(): array
    {
        return Cache::remember('investor_analytics', 1800, function () {
            $investorData = User::where('is_investor', true)
                ->withCount(['investments as total_investments_count'])
                ->withSum('investments as total_invested', 'amount')
                ->with(['investments' => function ($query) {
                    $query->select('investor_id', 'amount', 'status', 'created_at');
                }])
                ->having('total_investments_count', '>', 0)
                ->get();

            $totalInvestors = $investorData->count();
            $activeInvestors = $investorData->filter(function ($investor) {
                return $investor->investments->where('created_at', '>=', now()->subMonths(6))->count() > 0;
            })->count();

            // Investment size distribution
            $investmentSizes = $investorData->map(function ($investor) {
                return $investor->investments_sum_total_invested ?: 0;
            });

            // Experience level distribution
            $experienceLevels = $investorData->groupBy(function ($investor) {
                if (!$investor->investment_experience_years) return 'Not Specified';
                if ($investor->investment_experience_years <= 2) return '0-2 years';
                if ($investor->investment_experience_years <= 5) return '3-5 years';
                if ($investor->investment_experience_years <= 10) return '6-10 years';
                return '10+ years';
            })->map->count();

            return [
                'total_investors' => User::where('is_investor', true)->count(),
                'active_investors' => $activeInvestors,
                'verified_investors' => User::where('is_investor', true)->where('is_verified', true)->count(),
                'average_investments_per_investor' => $totalInvestors > 0 ? $investorData->avg('total_investments_count') : 0,
                'median_investment_amount' => $this->calculateMedian($investmentSizes->toArray()),
                'total_portfolio_value' => $investorData->sum('total_invested'),
                'top_investors' => $this->getTopInvestors(10),
                'investment_size_distribution' => $this->getInvestmentSizeDistribution($investmentSizes),
                'experience_level_distribution' => $experienceLevels->toArray(),
                'geographic_distribution' => $this->getInvestorGeographicDistribution()
            ];
        });
    }

    public function getStartupAnalytics(): array
    {
        return Cache::remember('startup_analytics', 1800, function () {
            $startupData = Startup::withCount(['investments as total_investments_count'])
                ->withSum('investments as total_raised', 'amount')
                ->with(['investmentRounds'])
                ->get();

            $fundedStartups = $startupData->filter(function ($startup) {
                return $startup->total_investments_count > 0;
            });

            $successfulStartups = $startupData->filter(function ($startup) {
                return $startup->investmentRounds->where('status', 'successful')->count() > 0;
            });

            return [
                'total_startups' => $startupData->count(),
                'funded_startups' => $fundedStartups->count(),
                'seeking_funding' => Startup::whereHas('investmentRounds', function ($q) {
                    $q->where('status', 'active');
                })->count(),
                'successful_funding_rounds' => $successfulStartups->count(),
                'funding_success_rate' => $startupData->count() > 0 ? ($successfulStartups->count() / $startupData->count()) * 100 : 0,
                'average_funding_raised' => $fundedStartups->avg('total_raised'),
                'total_platform_funding' => $fundedStartups->sum('total_raised'),
                'startups_with_mvp' => Startup::where('has_mvp', true)->count(),
                'verified_startups' => Startup::where('verified', true)->count(),
                'funding_stage_distribution' => $this->getFundingStageDistribution(),
                'top_funded_startups' => $this->getTopFundedStartups(10)
            ];
        });
    }

    public function getUserActivityMetrics(int $days = 30): array
    {
        $startDate = now()->subDays($days);

        return [
            'new_users' => User::where('created_at', '>=', $startDate)->count(),
            'new_investors' => User::where('is_investor', true)->where('created_at', '>=', $startDate)->count(),
            'new_startups' => Startup::where('created_at', '>=', $startDate)->count(),
            'new_investment_rounds' => InvestmentRound::where('created_at', '>=', $startDate)->count(),
            'new_investments' => Investment::where('created_at', '>=', $startDate)->count(),
            'active_users' => User::where('last_active_at', '>=', $startDate)->count(),
            'daily_activity' => $this->getDailyActivityMetrics($days),
            'user_retention' => $this->calculateUserRetention($days)
        ];
    }

    public function getPerformanceMetrics(): array
    {
        return Cache::remember('performance_metrics', 900, function () {
            $totalInvestments = Investment::whereIn('status', ['confirmed', 'active'])->count();
            $successfulInvestments = Investment::whereIn('status', ['successful', 'exited'])->count();
            $failedInvestments = Investment::where('status', 'failed')->count();

            $totalRounds = InvestmentRound::count();
            $successfulRounds = InvestmentRound::where('status', 'successful')->count();
            $failedRounds = InvestmentRound::where('status', 'failed')->count();

            return [
                'investment_success_rate' => $totalInvestments > 0 ? ($successfulInvestments / $totalInvestments) * 100 : 0,
                'investment_failure_rate' => $totalInvestments > 0 ? ($failedInvestments / $totalInvestments) * 100 : 0,
                'round_success_rate' => $totalRounds > 0 ? ($successfulRounds / $totalRounds) * 100 : 0,
                'round_failure_rate' => $totalRounds > 0 ? ($failedRounds / $totalRounds) * 100 : 0,
                'average_time_to_funding' => $this->calculateAverageTimeToFunding(),
                'average_round_duration' => $this->calculateAverageRoundDuration(),
                'platform_roi' => $this->calculatePlatformROI(),
                'investor_satisfaction_score' => $this->calculateInvestorSatisfactionScore()
            ];
        });
    }

    public function getCustomAnalytics(array $filters = []): array
    {
        $query = Investment::with(['startup', 'investor', 'investmentStage', 'investmentRound']);

        // Apply filters
        if (!empty($filters['start_date'])) {
            $query->where('created_at', '>=', $filters['start_date']);
        }

        if (!empty($filters['end_date'])) {
            $query->where('created_at', '<=', $filters['end_date']);
        }

        if (!empty($filters['industries'])) {
            $query->whereHas('startup', function ($q) use ($filters) {
                $q->whereIn('industry', $filters['industries']);
            });
        }

        if (!empty($filters['stages'])) {
            $query->whereHas('investmentStage', function ($q) use ($filters) {
                $q->whereIn('slug', $filters['stages']);
            });
        }

        if (!empty($filters['min_amount'])) {
            $query->where('amount', '>=', $filters['min_amount']);
        }

        if (!empty($filters['max_amount'])) {
            $query->where('amount', '<=', $filters['max_amount']);
        }

        if (!empty($filters['status'])) {
            $query->whereIn('status', (array) $filters['status']);
        }

        $investments = $query->get();

        return [
            'total_investments' => $investments->count(),
            'total_amount' => $investments->sum('amount'),
            'average_amount' => $investments->avg('amount'),
            'median_amount' => $this->calculateMedian($investments->pluck('amount')->toArray()),
            'unique_startups' => $investments->pluck('startup_id')->unique()->count(),
            'unique_investors' => $investments->pluck('investor_id')->unique()->count(),
            'industry_breakdown' => $investments->groupBy('startup.industry')->map->count(),
            'stage_breakdown' => $investments->groupBy('investmentStage.name')->map->count(),
            'status_breakdown' => $investments->groupBy('status')->map->count(),
            'monthly_trends' => $this->getMonthlyTrends($investments),
            'performance_metrics' => $this->calculateFilteredPerformanceMetrics($investments)
        ];
    }

    protected function calculatePlatformSuccessRate(): float
    {
        $totalRounds = InvestmentRound::count();
        $successfulRounds = InvestmentRound::where('status', 'successful')->count();

        return $totalRounds > 0 ? ($successfulRounds / $totalRounds) * 100 : 0;
    }

    protected function getTopInvestors(int $limit): array
    {
        return User::where('is_investor', true)
            ->withSum('investments as total_invested', 'amount')
            ->withCount('investments as total_investments')
            ->having('investments_sum_total_invested', '>', 0)
            ->orderByDesc('investments_sum_total_invested')
            ->limit($limit)
            ->get(['id', 'name', 'company', 'location'])
            ->map(function ($investor) {
                return [
                    'id' => $investor->id,
                    'name' => $investor->name,
                    'company' => $investor->company,
                    'location' => $investor->location,
                    'total_invested' => $investor->investments_sum_total_invested,
                    'total_investments' => $investor->investments_count_total_investments,
                    'formatted_total' => $this->formatCurrency($investor->investments_sum_total_invested)
                ];
            })
            ->toArray();
    }

    protected function getInvestmentSizeDistribution(Collection $amounts): array
    {
        $ranges = [
            '< $1K' => $amounts->filter(fn($amount) => $amount < 1000)->count(),
            '$1K - $5K' => $amounts->filter(fn($amount) => $amount >= 1000 && $amount < 5000)->count(),
            '$5K - $25K' => $amounts->filter(fn($amount) => $amount >= 5000 && $amount < 25000)->count(),
            '$25K - $100K' => $amounts->filter(fn($amount) => $amount >= 25000 && $amount < 100000)->count(),
            '$100K+' => $amounts->filter(fn($amount) => $amount >= 100000)->count()
        ];

        return $ranges;
    }

    protected function getInvestorGeographicDistribution(): array
    {
        return User::where('is_investor', true)
            ->whereNotNull('location')
            ->groupBy('location')
            ->selectRaw('location, COUNT(*) as count')
            ->orderByDesc('count')
            ->limit(10)
            ->pluck('count', 'location')
            ->toArray();
    }

    protected function getFundingStageDistribution(): array
    {
        return InvestmentRound::join('investment_stages', 'investment_rounds.stage_id', '=', 'investment_stages.id')
            ->groupBy('investment_stages.name')
            ->selectRaw('investment_stages.name, COUNT(*) as count')
            ->pluck('count', 'name')
            ->toArray();
    }

    protected function getTopFundedStartups(int $limit): array
    {
        return Startup::withSum('investments as total_raised', 'amount')
            ->having('investments_sum_total_raised', '>', 0)
            ->orderByDesc('investments_sum_total_raised')
            ->limit($limit)
            ->get(['id', 'title', 'industry'])
            ->map(function ($startup) {
                return [
                    'id' => $startup->id,
                    'name' => $startup->title,
                    'industry' => $startup->industry,
                    'total_raised' => $startup->investments_sum_total_raised,
                    'formatted_total' => $this->formatCurrency($startup->investments_sum_total_raised)
                ];
            })
            ->toArray();
    }

    protected function getDailyActivityMetrics(int $days): array
    {
        return Investment::where('created_at', '>=', now()->subDays($days))
            ->selectRaw('DATE(created_at) as date, COUNT(*) as investments, SUM(amount) as volume')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(function ($item) {
                return [
                    'date' => $item->date,
                    'investments' => $item->investments,
                    'volume' => $item->volume,
                    'formatted_volume' => $this->formatCurrency($item->volume)
                ];
            })
            ->toArray();
    }

    protected function calculateUserRetention(int $days): float
    {
        $newUsers = User::where('created_at', '>=', now()->subDays($days))->count();
        $activeNewUsers = User::where('created_at', '>=', now()->subDays($days))
            ->where('last_active_at', '>=', now()->subDays(7))
            ->count();

        return $newUsers > 0 ? ($activeNewUsers / $newUsers) * 100 : 0;
    }

    protected function calculateAverageTimeToFunding(): float
    {
        return InvestmentRound::where('status', 'successful')
            ->whereNotNull('launched_at')
            ->whereNotNull('closed_at')
            ->get()
            ->avg(function ($round) {
                return $round->launched_at->diffInDays($round->closed_at);
            }) ?: 0;
    }

    protected function calculateAverageRoundDuration(): float
    {
        return InvestmentRound::whereIn('status', ['successful', 'failed', 'closed'])
            ->whereNotNull('launched_at')
            ->whereNotNull('closed_at')
            ->get()
            ->avg(function ($round) {
                return $round->launched_at->diffInDays($round->closed_at);
            }) ?: 0;
    }

    protected function calculatePlatformROI(): float
    {
        // This would require more complex calculations based on exit data
        // For now, return a placeholder
        return 0;
    }

    protected function calculateInvestorSatisfactionScore(): float
    {
        // This would be based on investor feedback/ratings
        // For now, return a placeholder
        return 0;
    }

    protected function calculateMedian(array $values): float
    {
        if (empty($values)) return 0;

        sort($values);
        $count = count($values);
        $middle = floor($count / 2);

        if ($count % 2 === 0) {
            return ($values[$middle - 1] + $values[$middle]) / 2;
        } else {
            return $values[$middle];
        }
    }

    protected function getMonthlyTrends(Collection $investments): array
    {
        return $investments->groupBy(function ($investment) {
            return $investment->created_at->format('Y-m');
        })->map(function ($monthlyInvestments, $month) {
            return [
                'month' => $month,
                'count' => $monthlyInvestments->count(),
                'total_amount' => $monthlyInvestments->sum('amount'),
                'average_amount' => $monthlyInvestments->avg('amount')
            ];
        })->values()->toArray();
    }

    protected function calculateFilteredPerformanceMetrics(Collection $investments): array
    {
        $successful = $investments->whereIn('status', ['successful', 'exited']);
        $failed = $investments->where('status', 'failed');

        return [
            'success_rate' => $investments->count() > 0 ? ($successful->count() / $investments->count()) * 100 : 0,
            'failure_rate' => $investments->count() > 0 ? ($failed->count() / $investments->count()) * 100 : 0,
            'total_returns' => $successful->sum('actual_return'),
            'average_roi' => $successful->avg(function ($investment) {
                return $investment->calculateROI();
            })
        ];
    }

    protected function formatCurrency(float $amount): string
    {
        if ($amount >= 1_000_000_000) {
            return '$' . round($amount / 1_000_000_000, 1) . 'B';
        }
        
        if ($amount >= 1_000_000) {
            return '$' . round($amount / 1_000_000, 1) . 'M';
        }
        
        if ($amount >= 1_000) {
            return '$' . round($amount / 1_000, 1) . 'K';
        }
        
        return '$' . number_format($amount, 0);
    }
}