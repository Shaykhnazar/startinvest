<?php

namespace App\Services;

use App\Models\Investment;
use App\Models\Startup;
use App\Models\User;
use App\Models\InvestmentUpdate;
use App\Notifications\InvestmentCreatedNotification;
use App\Notifications\InvestmentStatusUpdatedNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InvestmentService
{
    /**
     * Create a new investment
     */
    public function createInvestment(array $data, User $investor): Investment
    {
        return DB::transaction(function () use ($data, $investor) {
            // Validate startup exists and is accepting investments
            $startup = Startup::findOrFail($data['startup_id']);
            
            if (!$this->canInvestInStartup($startup, $investor)) {
                throw new \Exception('Cannot invest in this startup at this time.');
            }

            $investment = Investment::create([
                'startup_id' => $data['startup_id'],
                'investor_id' => $investor->id,
                'investment_stage_id' => $data['investment_stage_id'],
                'amount' => $data['amount'],
                'equity_percentage' => $data['equity_percentage'] ?? null,
                'expected_return' => $data['expected_return'] ?? null,
                'status' => 'pending',
                'invested_at' => $data['invested_at'] ?? now(),
                'notes' => $data['notes'] ?? null,
                'currency' => $data['currency'] ?? 'USD',
            ]);

            // Create initial investment update
            $this->createInvestmentUpdate($investment, [
                'title' => 'Investment Created',
                'content' => 'Investment proposal has been submitted and is pending review.',
                'update_type' => 'progress',
                'created_by' => $investor->id,
                'visibility' => 'private'
            ]);

            // Notify startup owner
            $startup->owner->notify(new InvestmentCreatedNotification($investment));

            Log::info('Investment created', [
                'investment_id' => $investment->id,
                'investor_id' => $investor->id,
                'startup_id' => $startup->id,
                'amount' => $data['amount']
            ]);

            return $investment->load(['startup', 'investor', 'investmentStage']);
        });
    }

    /**
     * Update an existing investment
     */
    public function updateInvestment(Investment $investment, array $data): Investment
    {
        return DB::transaction(function () use ($investment, $data) {
            $oldData = $investment->toArray();
            
            $investment->update($data);

            // Log significant changes
            $this->logInvestmentChanges($investment, $oldData, $data);

            return $investment->load(['startup', 'investor', 'investmentStage']);
        });
    }

    /**
     * Update investment status
     */
    public function updateStatus(Investment $investment, string $status, ?string $notes = null): Investment
    {
        return DB::transaction(function () use ($investment, $status, $notes) {
            $oldStatus = $investment->status;
            
            $investment->update([
                'status' => $status,
                'notes' => $notes ? ($investment->notes . "\n" . $notes) : $investment->notes
            ]);

            // Create status update
            $this->createInvestmentUpdate($investment, [
                'title' => "Investment Status Updated to " . ucfirst($status),
                'content' => $notes ?? "Investment status changed from {$oldStatus} to {$status}.",
                'update_type' => 'progress',
                'created_by' => auth()->id(),
                'is_milestone' => in_array($status, ['approved', 'active', 'completed', 'exited']),
                'visibility' => 'private'
            ]);

            // Send notifications
            $investment->investor->notify(new InvestmentStatusUpdatedNotification($investment, $oldStatus));
            $investment->startup->owner->notify(new InvestmentStatusUpdatedNotification($investment, $oldStatus));

            Log::info('Investment status updated', [
                'investment_id' => $investment->id,
                'old_status' => $oldStatus,
                'new_status' => $status,
                'updated_by' => auth()->id()
            ]);

            return $investment->load(['startup', 'investor', 'investmentStage']);
        });
    }

    /**
     * Record investment exit
     */
    public function recordExit(Investment $investment, float $actualReturn, string $exitDate, ?string $notes = null): Investment
    {
        return DB::transaction(function () use ($investment, $actualReturn, $exitDate, $notes) {
            if (!$investment->canExit()) {
                throw new \Exception('This investment cannot be exited at this time.');
            }

            $investment->update([
                'actual_return' => $actualReturn,
                'exit_date' => $exitDate,
                'status' => 'exited',
                'notes' => $notes ? ($investment->notes . "\n" . $notes) : $investment->notes
            ]);

            $roi = $investment->calculateROI();
            $profitLoss = $investment->calculateProfitLoss();

            // Create exit update
            $this->createInvestmentUpdate($investment, [
                'title' => 'Investment Exit Recorded',
                'content' => "Investment exit completed with ROI of {$roi}% and profit/loss of {$profitLoss}.",
                'update_type' => 'milestone',
                'created_by' => auth()->id(),
                'is_milestone' => true,
                'financial_impact' => $profitLoss,
                'visibility' => 'private'
            ]);

            Log::info('Investment exit recorded', [
                'investment_id' => $investment->id,
                'actual_return' => $actualReturn,
                'roi' => $roi,
                'profit_loss' => $profitLoss
            ]);

            return $investment->load(['startup', 'investor', 'investmentStage']);
        });
    }

    /**
     * Delete an investment
     */
    public function deleteInvestment(Investment $investment): bool
    {
        return DB::transaction(function () use ($investment) {
            // Soft delete related records
            $investment->investmentDocuments()->delete();
            $investment->investmentUpdates()->delete();
            
            // Soft delete the investment
            $investment->delete();

            Log::info('Investment deleted', [
                'investment_id' => $investment->id,
                'deleted_by' => auth()->id()
            ]);

            return true;
        });
    }

    /**
     * Get investment dashboard data for a user
     */
    public function getDashboardData(User $user): array
    {
        $investments = Investment::where('investor_id', $user->id)->with(['startup', 'investmentStage']);

        return [
            'total_investments' => $investments->count(),
            'total_invested' => $investments->sum('amount'),
            'active_investments' => $investments->where('status', 'active')->count(),
            'total_returns' => $investments->whereNotNull('actual_return')->sum('actual_return'),
            'average_roi' => $this->calculateAverageROI($user),
            'portfolio_performance' => $this->getPortfolioPerformance($user),
            'recent_investments' => $investments->latest()->take(5)->get(),
            'investment_by_stage' => $this->getInvestmentsByStage($user),
            'monthly_investment_trend' => $this->getMonthlyInvestmentTrend($user),
        ];
    }

    /**
     * Get investment analytics for a specific investment
     */
    public function getInvestmentAnalytics(Investment $investment): array
    {
        return [
            'roi' => $investment->calculateROI(),
            'profit_loss' => $investment->calculateProfitLoss(),
            'expected_roi' => $investment->getExpectedROI(),
            'performance_score' => $investment->getPerformanceScore(),
            'investment_duration' => $investment->getInvestmentDuration(),
            'status_history' => $this->getStatusHistory($investment),
            'financial_timeline' => $this->getFinancialTimeline($investment),
            'risk_assessment' => $this->calculateRiskAssessment($investment),
        ];
    }

    /**
     * Get portfolio summary for an investor
     */
    public function getPortfolioSummary(User $investor): array
    {
        $investments = Investment::where('investor_id', $investor->id);

        $totalInvested = $investments->sum('amount');
        $totalReturns = $investments->whereNotNull('actual_return')->sum('actual_return');
        $unrealizedInvestments = $investments->where('status', 'active')->sum('amount');

        return [
            'total_invested' => $totalInvested,
            'total_returns' => $totalReturns,
            'unrealized_investments' => $unrealizedInvestments,
            'net_profit_loss' => $totalReturns - $totalInvested,
            'portfolio_roi' => $totalInvested > 0 ? (($totalReturns - $totalInvested) / $totalInvested) * 100 : 0,
            'diversification_score' => $this->calculateDiversificationScore($investor),
            'risk_score' => $this->calculatePortfolioRisk($investor),
            'top_performers' => $this->getTopPerformingInvestments($investor),
            'underperformers' => $this->getUnderperformingInvestments($investor),
        ];
    }

    /**
     * Get investment statistics
     */
    public function getInvestmentStats(User $user): array
    {
        $query = Investment::where('investor_id', $user->id);

        return [
            'total' => $query->count(),
            'active' => $query->where('status', 'active')->count(),
            'completed' => $query->where('status', 'completed')->count(),
            'pending' => $query->where('status', 'pending')->count(),
            'total_amount' => $query->sum('amount'),
            'average_amount' => $query->avg('amount'),
            'success_rate' => $this->calculateSuccessRate($user),
        ];
    }

    /**
     * Export investments data
     */
    public function exportInvestments(User $user, array $filters = []): array
    {
        $query = Investment::where('investor_id', $user->id)
            ->with(['startup', 'investmentStage']);

        // Apply filters
        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['date_from'])) {
            $query->where('invested_at', '>=', $filters['date_from']);
        }

        if (!empty($filters['date_to'])) {
            $query->where('invested_at', '<=', $filters['date_to']);
        }

        $investments = $query->get();

        return $investments->map(function ($investment) {
            return [
                'id' => $investment->id,
                'startup_name' => $investment->startup->title,
                'amount' => $investment->amount,
                'equity_percentage' => $investment->equity_percentage,
                'status' => $investment->status,
                'invested_at' => $investment->invested_at?->format('Y-m-d'),
                'expected_return' => $investment->expected_return,
                'actual_return' => $investment->actual_return,
                'roi' => $investment->calculateROI(),
                'profit_loss' => $investment->calculateProfitLoss(),
                'exit_date' => $investment->exit_date?->format('Y-m-d'),
                'investment_stage' => $investment->investmentStage->name ?? 'N/A',
            ];
        })->toArray();
    }

    // Private helper methods

    private function canInvestInStartup(Startup $startup, User $investor): bool
    {
        // Add business logic to determine if investment is allowed
        if ($startup->owner_id === $investor->id) {
            return false; // Can't invest in own startup
        }

        // Check if startup is accepting investments
        if (!in_array($startup->status_id, [1, 2, 3])) { // Assuming active statuses
            return false;
        }

        return true;
    }

    private function createInvestmentUpdate(Investment $investment, array $data): InvestmentUpdate
    {
        return InvestmentUpdate::create(array_merge($data, [
            'investment_id' => $investment->id,
        ]));
    }

    private function logInvestmentChanges(Investment $investment, array $oldData, array $newData): void
    {
        $changes = array_diff_assoc($newData, $oldData);
        
        if (!empty($changes)) {
            Log::info('Investment updated', [
                'investment_id' => $investment->id,
                'changes' => $changes,
                'updated_by' => auth()->id()
            ]);
        }
    }

    private function calculateAverageROI(User $user): float
    {
        $completedInvestments = Investment::where('investor_id', $user->id)
            ->whereNotNull('actual_return')
            ->get();

        if ($completedInvestments->isEmpty()) {
            return 0;
        }

        $totalROI = $completedInvestments->sum(function ($investment) {
            return $investment->calculateROI();
        });

        return $totalROI / $completedInvestments->count();
    }

    private function getPortfolioPerformance(User $user): array
    {
        // Implementation for portfolio performance calculation
        return [
            'ytd_return' => 0, // Year to date return
            'monthly_return' => 0, // Monthly return
            'total_return' => 0, // Total return since inception
        ];
    }

    private function getInvestmentsByStage(User $user): array
    {
        return Investment::where('investor_id', $user->id)
            ->with('investmentStage')
            ->get()
            ->groupBy('investmentStage.name')
            ->map(function ($investments, $stage) {
                return [
                    'stage' => $stage,
                    'count' => $investments->count(),
                    'total_amount' => $investments->sum('amount'),
                ];
            })->values()->toArray();
    }

    private function getMonthlyInvestmentTrend(User $user): array
    {
        return Investment::where('investor_id', $user->id)
            ->selectRaw('YEAR(invested_at) as year, MONTH(invested_at) as month, SUM(amount) as total_amount, COUNT(*) as count')
            ->whereNotNull('invested_at')
            ->groupByRaw('YEAR(invested_at), MONTH(invested_at)')
            ->orderByRaw('YEAR(invested_at), MONTH(invested_at)')
            ->get()
            ->map(function ($item) {
                return [
                    'period' => Carbon::createFromDate($item->year, $item->month, 1)->format('M Y'),
                    'total_amount' => $item->total_amount,
                    'count' => $item->count,
                ];
            })->toArray();
    }

    private function getStatusHistory(Investment $investment): array
    {
        return $investment->investmentUpdates()
            ->where('update_type', 'progress')
            ->orderBy('created_at')
            ->get(['title', 'content', 'created_at'])
            ->toArray();
    }

    private function getFinancialTimeline(Investment $investment): array
    {
        return $investment->investmentUpdates()
            ->where('update_type', 'financial')
            ->whereNotNull('financial_impact')
            ->orderBy('created_at')
            ->get(['title', 'financial_impact', 'created_at'])
            ->toArray();
    }

    private function calculateRiskAssessment(Investment $investment): array
    {
        // Simple risk assessment based on various factors
        $riskScore = 0;
        $factors = [];

        // Stage risk
        if ($investment->investmentStage && in_array($investment->investmentStage->name, ['Seed', 'Pre-Seed'])) {
            $riskScore += 30;
            $factors[] = 'Early stage investment';
        }

        // Amount risk
        if ($investment->amount > 100000) {
            $riskScore += 20;
            $factors[] = 'High investment amount';
        }

        // Time risk
        $duration = $investment->getInvestmentDuration();
        if ($duration && $duration > 1095) { // More than 3 years
            $riskScore += 15;
            $factors[] = 'Long investment duration';
        }

        return [
            'score' => min(100, $riskScore),
            'level' => $riskScore < 30 ? 'Low' : ($riskScore < 60 ? 'Medium' : 'High'),
            'factors' => $factors,
        ];
    }

    private function calculateSuccessRate(User $user): float
    {
        $completedInvestments = Investment::where('investor_id', $user->id)
            ->whereIn('status', ['completed', 'exited'])
            ->count();

        $successfulInvestments = Investment::where('investor_id', $user->id)
            ->whereIn('status', ['completed', 'exited'])
            ->whereNotNull('actual_return')
            ->whereRaw('actual_return > amount')
            ->count();

        return $completedInvestments > 0 ? ($successfulInvestments / $completedInvestments) * 100 : 0;
    }

    private function calculateDiversificationScore(User $investor): float
    {
        // Simple diversification score based on industry spread
        $investments = Investment::where('investor_id', $investor->id)
            ->with('startup.industries')
            ->get();

        if ($investments->isEmpty()) {
            return 0;
        }

        $industries = $investments->flatMap(function ($investment) {
            return $investment->startup->industries->pluck('name');
        })->unique();

        $totalInvestments = $investments->count();
        $uniqueIndustries = $industries->count();

        return min(100, ($uniqueIndustries / max(1, $totalInvestments)) * 100);
    }

    private function calculatePortfolioRisk(User $investor): float
    {
        $investments = Investment::where('investor_id', $investor->id)->get();
        
        if ($investments->isEmpty()) {
            return 0;
        }

        $totalRisk = $investments->sum(function ($investment) {
            return $this->calculateRiskAssessment($investment)['score'];
        });

        return $totalRisk / $investments->count();
    }

    private function getTopPerformingInvestments(User $investor): array
    {
        return Investment::where('investor_id', $investor->id)
            ->whereNotNull('actual_return')
            ->with('startup')
            ->get()
            ->sortByDesc(function ($investment) {
                return $investment->calculateROI();
            })
            ->take(5)
            ->map(function ($investment) {
                return [
                    'id' => $investment->id,
                    'startup_name' => $investment->startup->title,
                    'roi' => $investment->calculateROI(),
                    'profit_loss' => $investment->calculateProfitLoss(),
                ];
            })->values()->toArray();
    }

    private function getUnderperformingInvestments(User $investor): array
    {
        return Investment::where('investor_id', $investor->id)
            ->whereNotNull('actual_return')
            ->with('startup')
            ->get()
            ->sortBy(function ($investment) {
                return $investment->calculateROI();
            })
            ->take(5)
            ->map(function ($investment) {
                return [
                    'id' => $investment->id,
                    'startup_name' => $investment->startup->title,
                    'roi' => $investment->calculateROI(),
                    'profit_loss' => $investment->calculateProfitLoss(),
                ];
            })->values()->toArray();
    }
}