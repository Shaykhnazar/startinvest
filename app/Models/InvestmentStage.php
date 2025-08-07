<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class InvestmentStage extends Model
{
    use AsSource, Filterable, Attachable;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'order_index',
        'min_funding_amount',
        'max_funding_amount',
        'typical_duration_months',
        'key_milestones',
        'investor_types',
        'equity_range_min',
        'equity_range_max',
        'risk_level',
        'success_rate',
        'is_active'
    ];

    protected $casts = [
        'min_funding_amount' => 'decimal:2',
        'max_funding_amount' => 'decimal:2',
        'key_milestones' => 'array',
        'investor_types' => 'array',
        'equity_range_min' => 'decimal:2',
        'equity_range_max' => 'decimal:2',
        'success_rate' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    public function investments(): HasMany
    {
        return $this->hasMany(Investment::class, 'investment_stage_id');
    }

    public function investmentRounds(): HasMany
    {
        return $this->hasMany(InvestmentRound::class, 'stage_id');
    }

    // Scopes
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeOrderedByStage(Builder $query): Builder
    {
        return $query->orderBy('order_index');
    }

    public function scopeByRiskLevel(Builder $query, string $riskLevel): Builder
    {
        return $query->where('risk_level', $riskLevel);
    }

    public function scopeForInvestorType(Builder $query, string $investorType): Builder
    {
        return $query->whereJsonContains('investor_types', $investorType);
    }

    public function scopeInFundingRange(Builder $query, float $minAmount = null, float $maxAmount = null): Builder
    {
        if ($minAmount !== null) {
            $query->where('max_funding_amount', '>=', $minAmount);
        }
        
        if ($maxAmount !== null) {
            $query->where('min_funding_amount', '<=', $maxAmount);
        }
        
        return $query;
    }

    // Accessors & Mutators
    public function getFormattedFundingRangeAttribute(): string
    {
        $min = $this->formatCurrency($this->min_funding_amount);
        $max = $this->formatCurrency($this->max_funding_amount);
        
        return "{$min} - {$max}";
    }

    public function getFormattedEquityRangeAttribute(): string
    {
        if (!$this->equity_range_min || !$this->equity_range_max) {
            return 'Variable';
        }
        
        return "{$this->equity_range_min}% - {$this->equity_range_max}%";
    }

    public function getRiskLevelColorAttribute(): string
    {
        return match($this->risk_level) {
            'low' => 'green',
            'medium' => 'yellow',
            'high' => 'red',
            'very_high' => 'red',
            default => 'gray'
        };
    }

    public function getSuccessRateColorAttribute(): string
    {
        if ($this->success_rate >= 70) return 'green';
        if ($this->success_rate >= 50) return 'yellow';
        if ($this->success_rate >= 30) return 'orange';
        return 'red';
    }

    // Methods
    public function isEarlyStage(): bool
    {
        return in_array($this->slug, ['pre_seed', 'seed', 'series_a']);
    }

    public function isLateStage(): bool
    {
        return in_array($this->slug, ['series_c', 'series_d', 'pre_ipo', 'ipo']);
    }

    public function isGrowthStage(): bool
    {
        return in_array($this->slug, ['series_b', 'series_c']);
    }

    public function getNextStage(): ?InvestmentStage
    {
        return static::active()
            ->where('order_index', '>', $this->order_index)
            ->orderBy('order_index')
            ->first();
    }

    public function getPreviousStage(): ?InvestmentStage
    {
        return static::active()
            ->where('order_index', '<', $this->order_index)
            ->orderBy('order_index', 'desc')
            ->first();
    }

    public function getTotalInvestmentsAmount(): float
    {
        return $this->investments()->sum('amount');
    }

    public function getAverageInvestmentAmount(): float
    {
        return $this->investments()->avg('amount') ?? 0;
    }

    public function getActiveInvestmentsCount(): int
    {
        return $this->investments()->where('status', 'active')->count();
    }

    public function isAppropriateForAmount(float $amount): bool
    {
        return $amount >= $this->min_funding_amount && $amount <= $this->max_funding_amount;
    }

    public function getSuitableInvestorTypes(): array
    {
        return $this->investor_types ?? [];
    }

    public function hasInvestorType(string $type): bool
    {
        return in_array($type, $this->getSuitableInvestorTypes());
    }

    public function getKeyMilestones(): array
    {
        return $this->key_milestones ?? [];
    }

    public function addMilestone(string $milestone): void
    {
        $milestones = $this->getKeyMilestones();
        $milestones[] = $milestone;
        
        $this->update(['key_milestones' => array_unique($milestones)]);
    }

    public function removeMilestone(string $milestone): void
    {
        $milestones = $this->getKeyMilestones();
        $milestones = array_filter($milestones, fn($m) => $m !== $milestone);
        
        $this->update(['key_milestones' => array_values($milestones)]);
    }

    public function updateSuccessRate(): void
    {
        $totalInvestments = $this->investments()->count();
        
        if ($totalInvestments === 0) {
            $this->update(['success_rate' => 0]);
            return;
        }
        
        $successfulInvestments = $this->investments()
            ->whereIn('status', ['successful', 'exited', 'profitable'])
            ->count();
        
        $successRate = ($successfulInvestments / $totalInvestments) * 100;
        $this->update(['success_rate' => round($successRate, 2)]);
    }

    public function getInvestmentMetrics(): array
    {
        $investments = $this->investments();
        
        return [
            'total_count' => $investments->count(),
            'total_amount' => $investments->sum('amount'),
            'average_amount' => $investments->avg('amount') ?? 0,
            'active_count' => $investments->where('status', 'active')->count(),
            'successful_count' => $investments->whereIn('status', ['successful', 'exited'])->count(),
            'failed_count' => $investments->whereIn('status', ['failed', 'terminated'])->count(),
            'success_rate' => $this->success_rate ?? 0,
            'min_investment' => $investments->min('amount') ?? 0,
            'max_investment' => $investments->max('amount') ?? 0
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

    // Static methods
    public static function getStageBySlug(string $slug): ?InvestmentStage
    {
        return static::active()->where('slug', $slug)->first();
    }

    public static function getEarlyStages(): \Illuminate\Database\Eloquent\Collection
    {
        return static::active()
            ->whereIn('slug', ['pre_seed', 'seed', 'series_a'])
            ->orderBy('order_index')
            ->get();
    }

    public static function getGrowthStages(): \Illuminate\Database\Eloquent\Collection
    {
        return static::active()
            ->whereIn('slug', ['series_b', 'series_c'])
            ->orderBy('order_index')
            ->get();
    }

    public static function getLateStages(): \Illuminate\Database\Eloquent\Collection
    {
        return static::active()
            ->whereIn('slug', ['series_c', 'series_d', 'pre_ipo', 'ipo'])
            ->orderBy('order_index')
            ->get();
    }

    public static function seedDefaultStages(): void
    {
        $stages = [
            [
                'name' => 'Pre-Seed',
                'slug' => 'pre_seed',
                'description' => 'Very early stage funding for idea validation and initial development',
                'order_index' => 1,
                'min_funding_amount' => 10000,
                'max_funding_amount' => 250000,
                'typical_duration_months' => 6,
                'equity_range_min' => 5,
                'equity_range_max' => 20,
                'risk_level' => 'very_high',
                'investor_types' => ['angel', 'founder', 'friends_family'],
                'key_milestones' => ['MVP development', 'Initial user feedback', 'Team assembly']
            ],
            [
                'name' => 'Seed',
                'slug' => 'seed',
                'description' => 'Early funding to develop product and validate market fit',
                'order_index' => 2,
                'min_funding_amount' => 250000,
                'max_funding_amount' => 2000000,
                'typical_duration_months' => 12,
                'equity_range_min' => 10,
                'equity_range_max' => 25,
                'risk_level' => 'high',
                'investor_types' => ['angel', 'seed_fund', 'accelerator'],
                'key_milestones' => ['Product-market fit', 'Initial traction', 'Key hires']
            ],
            [
                'name' => 'Series A',
                'slug' => 'series_a',
                'description' => 'Scaling the business model with proven traction',
                'order_index' => 3,
                'min_funding_amount' => 2000000,
                'max_funding_amount' => 15000000,
                'typical_duration_months' => 18,
                'equity_range_min' => 15,
                'equity_range_max' => 30,
                'risk_level' => 'high',
                'investor_types' => ['vc_fund', 'institutional'],
                'key_milestones' => ['Revenue growth', 'Market expansion', 'Operational efficiency']
            ],
            [
                'name' => 'Series B',
                'slug' => 'series_b',
                'description' => 'Expanding market reach and scaling operations',
                'order_index' => 4,
                'min_funding_amount' => 15000000,
                'max_funding_amount' => 50000000,
                'typical_duration_months' => 24,
                'equity_range_min' => 10,
                'equity_range_max' => 25,
                'risk_level' => 'medium',
                'investor_types' => ['vc_fund', 'growth_equity'],
                'key_milestones' => ['Market leadership', 'International expansion', 'Profitability path']
            ]
        ];

        foreach ($stages as $stage) {
            static::updateOrCreate(
                ['slug' => $stage['slug']],
                array_merge($stage, ['is_active' => true])
            );
        }
    }
}
