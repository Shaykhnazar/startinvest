<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Investor extends Model
{
    use AsSource, Filterable, Attachable, SoftDeletes;

    protected $fillable = [
        'user_id',
        'company_name',
        'bio',
        'investment_focus',
        'portfolio_size',
        'risk_profile',
        'minimum_investment',
        'maximum_investment',
        'aum', // Assets Under Management
        'accredited_status',
        'investment_experience_years',
        'preferred_regions',
        'investment_criteria',
        'linkedin_profile',
        'website_url',
        'is_active',
        'is_verified',
        'verification_documents',
        'contacts'
    ];

    protected $casts = [
        'minimum_investment' => 'decimal:2',
        'maximum_investment' => 'decimal:2',
        'aum' => 'decimal:2',
        'portfolio_size' => 'integer',
        'investment_experience_years' => 'integer',
        'accredited_status' => 'boolean',
        'is_active' => 'boolean',
        'is_verified' => 'boolean',
        'preferred_regions' => 'array',
        'investment_criteria' => 'array',
        'verification_documents' => 'array',
        'contacts' => 'array'
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function investments(): HasMany
    {
        return $this->hasMany(Investment::class, 'investor_id', 'user_id');
    }

    public function preferredIndustries(): BelongsToMany
    {
        return $this->belongsToMany(Industry::class, 'investor_industry_preferences')
                    ->withPivot(['priority', 'allocation_percentage'])
                    ->withTimestamps();
    }

    public function preferredInvestmentStages(): BelongsToMany
    {
        return $this->belongsToMany(InvestmentStage::class, 'investor_investment_stage_preferences')
                    ->withPivot(['priority', 'allocation_percentage'])
                    ->withTimestamps();
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    public function scopeAccredited($query)
    {
        return $query->where('accredited_status', true);
    }

    public function scopeByRiskProfile($query, $riskProfile)
    {
        return $query->where('risk_profile', $riskProfile);
    }

    public function scopeByInvestmentRange($query, $min = null, $max = null)
    {
        if ($min) {
            $query->where('minimum_investment', '<=', $min);
        }
        if ($max) {
            $query->where('maximum_investment', '>=', $max);
        }
        return $query;
    }

    public function scopeByExperienceLevel($query, $years)
    {
        return $query->where('investment_experience_years', '>=', $years);
    }

    public function scopeWithIndustryPreference($query, $industryId)
    {
        return $query->whereHas('preferredIndustries', function ($q) use ($industryId) {
            $q->where('industry_id', $industryId);
        });
    }

    public function scopeByPortfolioSize($query, $minSize, $maxSize = null)
    {
        $query->where('portfolio_size', '>=', $minSize);
        if ($maxSize) {
            $query->where('portfolio_size', '<=', $maxSize);
        }
        return $query;
    }

    // Business Logic Methods
    public function getPortfolioAnalytics(): array
    {
        $investments = $this->investments()->with('startup')->get();
        
        return [
            'total_investments' => $investments->count(),
            'total_invested' => $investments->sum('amount'),
            'active_investments' => $investments->where('status', 'active')->count(),
            'completed_investments' => $investments->whereIn('status', ['completed', 'exited'])->count(),
            'average_investment_size' => $investments->count() > 0 ? $investments->avg('amount') : 0,
            'portfolio_roi' => $this->calculatePortfolioROI(),
            'diversification_score' => $this->calculateDiversificationScore(),
            'risk_score' => $this->calculatePortfolioRisk()
        ];
    }

    public function calculatePortfolioROI(): float
    {
        $investments = $this->investments()->whereNotNull('actual_return')->get();
        
        if ($investments->isEmpty()) {
            return 0;
        }
        
        $totalInvested = $investments->sum('amount');
        $totalReturns = $investments->sum('actual_return');
        
        return $totalInvested > 0 ? (($totalReturns - $totalInvested) / $totalInvested) * 100 : 0;
    }

    public function calculateDiversificationScore(): float
    {
        $investments = $this->investments()->with('startup.industries')->get();
        
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

    public function calculatePortfolioRisk(): float
    {
        $investments = $this->investments()->with(['startup', 'investmentStage'])->get();
        
        if ($investments->isEmpty()) {
            return 0;
        }
        
        $totalRisk = $investments->sum(function ($investment) {
            $riskScore = 0;
            
            // Stage risk
            if ($investment->investmentStage && in_array($investment->investmentStage->name, ['Seed', 'Pre-Seed'])) {
                $riskScore += 30;
            }
            
            // Amount risk
            if ($investment->amount > 100000) {
                $riskScore += 20;
            }
            
            // Duration risk
            $duration = $investment->getInvestmentDuration();
            if ($duration && $duration > 1095) {
                $riskScore += 15;
            }
            
            return min(100, $riskScore);
        });
        
        return $totalRisk / $investments->count();
    }

    public function getInvestmentHistory(): array
    {
        return $this->investments()
            ->with(['startup', 'investmentStage'])
            ->orderBy('invested_at', 'desc')
            ->get()
            ->map(function ($investment) {
                return [
                    'id' => $investment->id,
                    'startup_name' => $investment->startup->title,
                    'amount' => $investment->amount,
                    'status' => $investment->status,
                    'invested_at' => $investment->invested_at,
                    'roi' => $investment->calculateROI()
                ];
            })
            ->toArray();
    }

    public function getTopPerformingInvestments(int $limit = 5): array
    {
        return $this->investments()
            ->whereNotNull('actual_return')
            ->with('startup')
            ->get()
            ->sortByDesc(function ($investment) {
                return $investment->calculateROI();
            })
            ->take($limit)
            ->map(function ($investment) {
                return [
                    'id' => $investment->id,
                    'startup_name' => $investment->startup->title,
                    'amount' => $investment->amount,
                    'roi' => $investment->calculateROI(),
                    'profit_loss' => $investment->calculateProfitLoss()
                ];
            })
            ->values()
            ->toArray();
    }

    public function getInvestmentRecommendations(): array
    {
        // Simple recommendation algorithm based on preferences
        $preferredIndustries = $this->preferredIndustries->pluck('id')->toArray();
        $preferredStages = $this->preferredInvestmentStages->pluck('id')->toArray();
        
        $startups = Startup::active()
            ->whereHas('industries', function ($query) use ($preferredIndustries) {
                $query->whereIn('industry_id', $preferredIndustries);
            })
            ->where('funding_goal', '>=', $this->minimum_investment)
            ->where('funding_goal', '<=', $this->maximum_investment)
            ->with(['industries', 'owner'])
            ->limit(10)
            ->get();
        
        return $startups->map(function ($startup) {
            return [
                'startup_id' => $startup->id,
                'title' => $startup->title,
                'description' => $startup->description,
                'funding_goal' => $startup->funding_goal,
                'industries' => $startup->industries->pluck('name'),
                'match_score' => $this->calculateMatchScore($startup)
            ];
        })->toArray();
    }

    private function calculateMatchScore(Startup $startup): float
    {
        $score = 0;
        
        // Industry match
        $commonIndustries = $startup->industries->pluck('id')
            ->intersect($this->preferredIndustries->pluck('id'));
        $score += ($commonIndustries->count() / max(1, $startup->industries->count())) * 40;
        
        // Investment range match
        if ($startup->funding_goal >= $this->minimum_investment && 
            $startup->funding_goal <= $this->maximum_investment) {
            $score += 30;
        }
        
        // Risk profile match (simplified)
        if ($this->risk_profile === 'high' && in_array($startup->status_id, [1, 2])) {
            $score += 20;
        } elseif ($this->risk_profile === 'medium' && in_array($startup->status_id, [2, 3])) {
            $score += 20;
        } elseif ($this->risk_profile === 'low' && in_array($startup->status_id, [3, 4])) {
            $score += 20;
        }
        
        // Experience bonus
        if ($this->investment_experience_years >= 5) {
            $score += 10;
        }
        
        return min(100, $score);
    }

    public function getInvestorScore(): float
    {
        $score = 0;
        
        // Experience score (0-25 points)
        $experienceScore = min(25, $this->investment_experience_years * 2.5);
        $score += $experienceScore;
        
        // Portfolio size score (0-25 points)
        $portfolioScore = min(25, ($this->portfolio_size / 50) * 25);
        $score += $portfolioScore;
        
        // AUM score (0-25 points)
        if ($this->aum > 0) {
            $aumScore = min(25, log10($this->aum / 100000) * 5);
            $score += max(0, $aumScore);
        }
        
        // Verification and activity score (0-25 points)
        if ($this->is_verified) $score += 15;
        if ($this->accredited_status) $score += 10;
        
        return min(100, $score);
    }

    public function getRiskProfileLabel(): string
    {
        return match($this->risk_profile) {
            'low' => 'Conservative',
            'medium' => 'Moderate',
            'high' => 'Aggressive',
            default => 'Not Set'
        };
    }

    public function getExperienceLevelLabel(): string
    {
        $years = $this->investment_experience_years;
        
        if ($years < 2) return 'Novice';
        if ($years < 5) return 'Intermediate';
        if ($years < 10) return 'Experienced';
        return 'Expert';
    }

    public function isQualifiedFor(Startup $startup): bool
    {
        // Check minimum investment capability
        if ($startup->funding_goal > $this->maximum_investment) {
            return false;
        }
        
        // Check if investor is active and verified
        if (!$this->is_active || !$this->is_verified) {
            return false;
        }
        
        // Check industry preferences
        if ($this->preferredIndustries->isNotEmpty()) {
            $hasCommonIndustry = $startup->industries
                ->pluck('id')
                ->intersect($this->preferredIndustries->pluck('id'))
                ->isNotEmpty();
            
            if (!$hasCommonIndustry) {
                return false;
            }
        }
        
        return true;
    }

    // Accessor methods
    public function getFullNameAttribute(): string
    {
        return $this->company_name ?: $this->user->name;
    }

    public function getAvatarAttribute(): ?string
    {
        return $this->user->avatar ?? null;
    }
}
