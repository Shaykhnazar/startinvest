<?php

namespace App\Services;

use App\Models\User;
use App\Models\Startup;
use App\Models\Investment;
use App\Models\InvestorPreferences;
use App\Models\PortfolioTracking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class InvestorService
{
    public function calculatePortfolioAnalytics(User $investor): array
    {
        if (!$investor->is_investor) {
            throw new \InvalidArgumentException('User is not an investor');
        }

        $investments = $investor->investments()->with('startup')->get();
        $portfolioTracking = $investor->portfolioTracking()->with('startup')->get();

        if ($investments->isEmpty()) {
            return $this->getEmptyAnalytics();
        }

        return [
            'overview' => $this->calculateOverviewMetrics($investor, $investments),
            'performance' => $this->calculatePerformanceMetrics($portfolioTracking),
            'diversification' => $this->calculateDiversificationMetrics($investments),
            'risk_analysis' => $this->calculateRiskAnalysis($portfolioTracking),
            'industry_breakdown' => $this->calculateIndustryBreakdown($investments),
            'stage_breakdown' => $this->calculateStageBreakdown($investments),
            'timeline_analysis' => $this->calculateTimelineAnalysis($investments),
            'recommendations' => $this->generatePortfolioRecommendations($investor)
        ];
    }

    public function calculateInvestmentRecommendations(User $investor, int $limit = 10): Collection
    {
        if (!$investor->is_investor) {
            throw new \InvalidArgumentException('User is not an investor');
        }

        $preferences = $investor->investorPreferences;
        
        // Get base query for available startups
        $query = Startup::where('is_seeking_investment', true)
            ->where('is_active', true)
            ->with(['user', 'investments'])
            ->whereDoesntHave('investments', function ($q) use ($investor) {
                $q->where('investor_id', $investor->id);
            });

        // Apply preference filters if available
        if ($preferences) {
            $query = $this->applyPreferenceFilters($query, $preferences);
        }

        $startups = $query->get();

        // Calculate match scores and sort
        $scoredStartups = $startups->map(function ($startup) use ($investor, $preferences) {
            $startup->match_score = $this->calculateMatchScore($investor, $startup, $preferences);
            return $startup;
        })->sortByDesc('match_score');

        return $scoredStartups->take($limit);
    }

    public function calculateMatchScore(User $investor, Startup $startup, ?InvestorPreferences $preferences = null): float
    {
        $score = 0.0;
        $factors = 0;

        $preferences = $preferences ?? $investor->investorPreferences;

        if (!$preferences) {
            return 50.0; // Default neutral score
        }

        // Industry match (25% weight)
        if ($preferences->preferred_industries && $startup->industry) {
            $factors++;
            if (in_array($startup->industry, $preferences->preferred_industries)) {
                $score += 25;
            }
        }

        // Stage match (20% weight)
        if ($preferences->preferred_stages && $startup->stage) {
            $factors++;
            if (in_array($startup->stage, $preferences->preferred_stages)) {
                $score += 20;
            }
        }

        // Investment size match (20% weight)
        if ($preferences->min_investment_amount && $preferences->max_investment_amount && $startup->funding_goal) {
            $factors++;
            if ($startup->funding_goal >= $preferences->min_investment_amount && 
                $startup->funding_goal <= $preferences->max_investment_amount) {
                $score += 20;
            } else {
                // Partial score for close matches
                $midpoint = ($preferences->min_investment_amount + $preferences->max_investment_amount) / 2;
                $distance = abs($startup->funding_goal - $midpoint);
                $maxDistance = $preferences->max_investment_amount - $preferences->min_investment_amount;
                $similarity = max(0, 1 - ($distance / $maxDistance));
                $score += $similarity * 20;
            }
        }

        // Location preference (10% weight)
        if ($preferences->preferred_locations && $startup->location) {
            $factors++;
            if (in_array($startup->location, $preferences->preferred_locations)) {
                $score += 10;
            }
        }

        // Risk tolerance match (15% weight)
        if ($preferences->risk_tolerance) {
            $factors++;
            $startupRisk = $this->assessStartupRisk($startup);
            $riskMatch = $this->calculateRiskMatch($preferences->risk_tolerance, $startupRisk);
            $score += $riskMatch * 15;
        }

        // Startup traction and metrics (10% weight)
        $factors++;
        $tractionScore = $this->calculateTractionScore($startup);
        $score += $tractionScore * 10;

        // Normalize score based on available factors
        if ($factors > 0) {
            $maxPossibleScore = $factors > 0 ? 100 : 1;
            $normalizedScore = ($score / ($factors * 100)) * 100;
            return min(100, max(0, $normalizedScore));
        }

        return 50.0; // Default score if no factors available
    }

    public function updatePortfolioTracking(Investment $investment): void
    {
        $tracking = PortfolioTracking::updateOrCreate(
            [
                'investor_id' => $investment->investor_id,
                'startup_id' => $investment->startup_id,
                'investment_id' => $investment->id
            ],
            [
                'initial_investment' => $investment->amount,
                'equity_percentage' => $investment->equity_percentage,
                'investment_date' => $investment->invested_at,
                'investment_stage' => $investment->startup->stage ?? 'unknown',
                'current_status' => $investment->status
            ]
        );

        $this->updateTrackingMetrics($tracking);
    }

    public function generateInvestorInsights(User $investor): array
    {
        if (!$investor->is_investor) {
            throw new \InvalidArgumentException('User is not an investor');
        }

        $investments = $investor->investments()->with('startup')->get();
        $portfolioTracking = $investor->portfolioTracking()->get();

        return [
            'performance_insights' => $this->generatePerformanceInsights($portfolioTracking),
            'diversification_insights' => $this->generateDiversificationInsights($investments),
            'risk_insights' => $this->generateRiskInsights($portfolioTracking),
            'opportunity_insights' => $this->generateOpportunityInsights($investor),
            'market_insights' => $this->generateMarketInsights($investments)
        ];
    }

    protected function calculateOverviewMetrics(User $investor, Collection $investments): array
    {
        return [
            'total_investments' => $investments->count(),
            'total_invested' => $investments->sum('amount'),
            'portfolio_companies' => $investments->pluck('startup_id')->unique()->count(),
            'active_investments' => $investments->where('status', 'active')->count(),
            'average_investment' => $investments->avg('amount'),
            'first_investment_date' => $investments->min('invested_at'),
            'latest_investment_date' => $investments->max('invested_at')
        ];
    }

    protected function calculatePerformanceMetrics(Collection $portfolioTracking): array
    {
        if ($portfolioTracking->isEmpty()) {
            return [
                'total_returns' => 0,
                'portfolio_roi' => 0,
                'best_performer' => null,
                'worst_performer' => null,
                'average_roi' => 0
            ];
        }

        $bestPerformer = $portfolioTracking->sortByDesc('roi_percentage')->first();
        $worstPerformer = $portfolioTracking->sortBy('roi_percentage')->first();

        return [
            'total_returns' => $portfolioTracking->sum('realized_return'),
            'portfolio_roi' => $portfolioTracking->avg('roi_percentage'),
            'best_performer' => $bestPerformer ? [
                'startup_name' => $bestPerformer->startup->name ?? 'Unknown',
                'roi' => $bestPerformer->roi_percentage
            ] : null,
            'worst_performer' => $worstPerformer ? [
                'startup_name' => $worstPerformer->startup->name ?? 'Unknown',
                'roi' => $worstPerformer->roi_percentage
            ] : null,
            'average_roi' => $portfolioTracking->avg('roi_percentage'),
            'positive_returns_count' => $portfolioTracking->where('roi_percentage', '>', 0)->count()
        ];
    }

    protected function calculateDiversificationMetrics(Collection $investments): array
    {
        $industryCount = $investments->pluck('startup.industry')->unique()->filter()->count();
        $stageCount = $investments->pluck('startup.stage')->unique()->filter()->count();
        $totalInvestments = $investments->count();

        return [
            'industry_diversification' => $totalInvestments > 0 ? ($industryCount / $totalInvestments) * 100 : 0,
            'stage_diversification' => $totalInvestments > 0 ? ($stageCount / $totalInvestments) * 100 : 0,
            'unique_industries' => $industryCount,
            'unique_stages' => $stageCount,
            'concentration_risk' => $this->calculateConcentrationRisk($investments)
        ];
    }

    protected function calculateRiskAnalysis(Collection $portfolioTracking): array
    {
        if ($portfolioTracking->isEmpty()) {
            return [
                'overall_risk_score' => 0,
                'high_risk_investments' => 0,
                'risk_distribution' => []
            ];
        }

        $riskScores = $portfolioTracking->pluck('risk_score')->filter();
        $highRiskCount = $riskScores->where('>', 7)->count();

        return [
            'overall_risk_score' => $riskScores->avg(),
            'high_risk_investments' => $highRiskCount,
            'risk_distribution' => [
                'low' => $riskScores->whereBetween('', [1, 3])->count(),
                'medium' => $riskScores->whereBetween('', [4, 6])->count(),
                'high' => $riskScores->whereBetween('', [7, 10])->count()
            ],
            'risk_trend' => $this->calculateRiskTrend($portfolioTracking)
        ];
    }

    protected function calculateIndustryBreakdown(Collection $investments): array
    {
        return $investments->groupBy('startup.industry')
            ->map(function ($group, $industry) {
                return [
                    'industry' => $industry ?? 'Unknown',
                    'count' => $group->count(),
                    'total_invested' => $group->sum('amount'),
                    'percentage' => 0 // Will be calculated after collection
                ];
            })
            ->values()
            ->toArray();
    }

    protected function calculateStageBreakdown(Collection $investments): array
    {
        return $investments->groupBy('startup.stage')
            ->map(function ($group, $stage) {
                return [
                    'stage' => $stage ?? 'Unknown',
                    'count' => $group->count(),
                    'total_invested' => $group->sum('amount'),
                    'percentage' => 0
                ];
            })
            ->values()
            ->toArray();
    }

    protected function calculateTimelineAnalysis(Collection $investments): array
    {
        $investmentsByMonth = $investments->groupBy(function ($investment) {
            return $investment->invested_at ? $investment->invested_at->format('Y-m') : 'Unknown';
        });

        return [
            'monthly_activity' => $investmentsByMonth->map(function ($group, $month) {
                return [
                    'month' => $month,
                    'count' => $group->count(),
                    'amount' => $group->sum('amount')
                ];
            })->values()->toArray(),
            'investment_velocity' => $this->calculateInvestmentVelocity($investments),
            'seasonal_patterns' => $this->analyzeSeasonalPatterns($investments)
        ];
    }

    protected function generatePortfolioRecommendations(User $investor): array
    {
        $investments = $investor->investments()->with('startup')->get();
        
        return [
            'diversification' => $this->generateDiversificationRecommendations($investments),
            'risk_management' => $this->generateRiskRecommendations($investor),
            'opportunity' => $this->generateOpportunityRecommendations($investor)
        ];
    }

    protected function applyPreferenceFilters($query, InvestorPreferences $preferences)
    {
        if ($preferences->preferred_industries) {
            $query->whereIn('industry', $preferences->preferred_industries);
        }

        if ($preferences->preferred_stages) {
            $query->whereIn('stage', $preferences->preferred_stages);
        }

        if ($preferences->min_investment_amount) {
            $query->where('funding_goal', '>=', $preferences->min_investment_amount);
        }

        if ($preferences->max_investment_amount) {
            $query->where('funding_goal', '<=', $preferences->max_investment_amount);
        }

        if ($preferences->preferred_locations) {
            $query->whereIn('location', $preferences->preferred_locations);
        }

        return $query;
    }

    protected function assessStartupRisk(Startup $startup): string
    {
        $score = 0;
        
        // Stage risk assessment
        $stageRisk = [
            'idea' => 8,
            'prototype' => 7,
            'mvp' => 6,
            'early' => 5,
            'growth' => 4,
            'expansion' => 3,
            'maturity' => 2
        ];
        $score += $stageRisk[$startup->stage] ?? 7;

        // Funding history
        if ($startup->investments()->count() > 0) {
            $score -= 1;
        }

        // Team size (if available)
        if ($startup->team_size > 5) {
            $score -= 1;
        }

        // Determine risk category
        if ($score <= 3) return 'low';
        if ($score <= 6) return 'medium';
        return 'high';
    }

    protected function calculateRiskMatch(array $tolerance, string $startupRisk): float
    {
        $toleranceScore = [
            'low' => ['low' => 1.0, 'medium' => 0.3, 'high' => 0.0],
            'medium' => ['low' => 0.8, 'medium' => 1.0, 'high' => 0.5],
            'high' => ['low' => 0.6, 'medium' => 0.8, 'high' => 1.0]
        ];

        $primaryTolerance = $tolerance[0] ?? 'medium';
        return $toleranceScore[$primaryTolerance][$startupRisk] ?? 0.5;
    }

    protected function calculateTractionScore(Startup $startup): float
    {
        $score = 0.0;

        // Investment traction
        $investmentCount = $startup->investments()->count();
        $score += min(1.0, $investmentCount / 5) * 0.4;

        // User metrics (if available)
        if ($startup->user_count && $startup->user_count > 0) {
            $score += min(1.0, $startup->user_count / 1000) * 0.3;
        }

        // Revenue (if available)
        if ($startup->monthly_revenue && $startup->monthly_revenue > 0) {
            $score += min(1.0, $startup->monthly_revenue / 10000) * 0.3;
        }

        return $score;
    }

    protected function updateTrackingMetrics(PortfolioTracking $tracking): void
    {
        // Update current valuation based on startup's latest valuation
        $startup = $tracking->startup;
        if ($startup && $startup->current_valuation) {
            $valuationGrowth = $startup->current_valuation / ($startup->initial_valuation ?: $startup->current_valuation);
            $tracking->current_valuation = $tracking->initial_investment * $valuationGrowth;
        }

        // Calculate ROI
        if ($tracking->initial_investment > 0) {
            $totalReturn = $tracking->current_valuation + $tracking->realized_return;
            $tracking->roi_percentage = (($totalReturn - $tracking->initial_investment) / $tracking->initial_investment) * 100;
        }

        // Update holding period
        $tracking->holding_period_months = $tracking->investment_date 
            ? $tracking->investment_date->diffInMonths(now())
            : 0;

        // Update risk score based on performance and time
        $tracking->risk_score = $this->calculateInvestmentRiskScore($tracking);

        $tracking->save();
    }

    protected function calculateInvestmentRiskScore(PortfolioTracking $tracking): int
    {
        $baseRisk = 5; // Medium risk baseline
        
        // Adjust based on ROI performance
        if ($tracking->roi_percentage < -20) {
            $baseRisk += 2;
        } elseif ($tracking->roi_percentage > 20) {
            $baseRisk -= 1;
        }

        // Adjust based on holding period
        if ($tracking->holding_period_months > 24) {
            $baseRisk -= 1; // Lower risk for longer holdings
        }

        return max(1, min(10, $baseRisk));
    }

    protected function getEmptyAnalytics(): array
    {
        return [
            'overview' => [
                'total_investments' => 0,
                'total_invested' => 0,
                'portfolio_companies' => 0,
                'active_investments' => 0,
                'average_investment' => 0
            ],
            'performance' => [
                'total_returns' => 0,
                'portfolio_roi' => 0,
                'average_roi' => 0
            ],
            'diversification' => [
                'industry_diversification' => 0,
                'stage_diversification' => 0
            ],
            'risk_analysis' => [
                'overall_risk_score' => 0,
                'high_risk_investments' => 0
            ]
        ];
    }

    // Additional helper methods would be implemented here for:
    // - generatePerformanceInsights()
    // - generateDiversificationInsights() 
    // - generateRiskInsights()
    // - generateOpportunityInsights()
    // - generateMarketInsights()
    // - calculateConcentrationRisk()
    // - calculateRiskTrend()
    // - calculateInvestmentVelocity()
    // - analyzeSeasonalPatterns()
    // - generateDiversificationRecommendations()
    // - generateRiskRecommendations()
    // - generateOpportunityRecommendations()
}