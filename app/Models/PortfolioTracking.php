<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class PortfolioTracking extends Model
{
    protected $fillable = [
        'investor_id',
        'startup_id',
        'investment_id',
        'initial_investment',
        'current_valuation',
        'paper_return',
        'realized_return',
        'roi_percentage',
        'equity_percentage',
        'performance_metrics',
        'milestone_tracking',
        'last_valuation_date',
        'investment_stage',
        'current_status',
        'risk_score',
        'risk_factors',
        'last_risk_assessment',
        'investment_date',
        'expected_exit_date',
        'actual_exit_date',
        'holding_period_months',
        'investor_notes',
        'update_history',
        'is_active'
    ];

    protected $casts = [
        'initial_investment' => 'decimal:2',
        'current_valuation' => 'decimal:2',
        'paper_return' => 'decimal:2',
        'realized_return' => 'decimal:2',
        'roi_percentage' => 'decimal:4',
        'equity_percentage' => 'decimal:4',
        'performance_metrics' => 'array',
        'milestone_tracking' => 'array',
        'risk_factors' => 'array',
        'update_history' => 'array',
        'last_valuation_date' => 'date',
        'last_risk_assessment' => 'date',
        'investment_date' => 'date',
        'expected_exit_date' => 'date',
        'actual_exit_date' => 'date',
        'is_active' => 'boolean'
    ];

    public function investor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'investor_id');
    }

    public function startup(): BelongsTo
    {
        return $this->belongsTo(Startup::class);
    }

    public function investment(): BelongsTo
    {
        return $this->belongsTo(Investment::class);
    }

    // Scopes
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeByStatus(Builder $query, string $status): Builder
    {
        return $query->where('current_status', $status);
    }

    public function scopeHighPerforming(Builder $query, float $minROI = 10.0): Builder
    {
        return $query->where('roi_percentage', '>=', $minROI);
    }

    public function scopeLowPerforming(Builder $query, float $maxROI = -5.0): Builder
    {
        return $query->where('roi_percentage', '<=', $maxROI);
    }

    public function scopeHighRisk(Builder $query, int $minRiskScore = 7): Builder
    {
        return $query->where('risk_score', '>=', $minRiskScore);
    }

    public function scopeByIndustry(Builder $query, string $industry): Builder
    {
        return $query->whereHas('startup', function ($q) use ($industry) {
            $q->where('industry', $industry);
        });
    }

    // Accessors & Mutators
    public function getTotalReturnAttribute(): float
    {
        return $this->current_valuation + $this->realized_return;
    }

    public function getUnrealizedReturnAttribute(): float
    {
        return $this->current_valuation - $this->initial_investment;
    }

    public function getRealizedReturnAttribute(): float
    {
        return $this->attributes['realized_return'] ?? 0;
    }

    public function getHoldingPeriodYearsAttribute(): float
    {
        return round(($this->holding_period_months ?? 0) / 12, 1);
    }

    public function getPerformanceStatusAttribute(): string
    {
        $roi = $this->roi_percentage ?? 0;
        
        if ($roi >= 20) return 'excellent';
        if ($roi >= 10) return 'good';
        if ($roi >= 0) return 'positive';
        if ($roi >= -10) return 'underperforming';
        return 'poor';
    }

    public function getRiskLevelAttribute(): string
    {
        $score = $this->risk_score ?? 5;
        
        if ($score <= 3) return 'low';
        if ($score <= 6) return 'medium';
        return 'high';
    }

    // Methods
    public function updateValuation(float $newValuation): void
    {
        $this->update([
            'current_valuation' => $newValuation,
            'last_valuation_date' => now(),
            'roi_percentage' => $this->calculateROI($newValuation)
        ]);
        
        $this->logUpdate('valuation_update', [
            'old_valuation' => $this->current_valuation,
            'new_valuation' => $newValuation
        ]);
    }

    public function recordRealizedReturn(float $amount): void
    {
        $this->increment('realized_return', $amount);
        $this->update(['roi_percentage' => $this->calculateROI()]);
        
        $this->logUpdate('realized_return', [
            'amount' => $amount,
            'total_realized' => $this->realized_return
        ]);
    }

    public function updateRiskAssessment(int $riskScore, array $riskFactors = []): void
    {
        $this->update([
            'risk_score' => $riskScore,
            'risk_factors' => $riskFactors,
            'last_risk_assessment' => now()
        ]);
        
        $this->logUpdate('risk_assessment', [
            'risk_score' => $riskScore,
            'risk_factors' => $riskFactors
        ]);
    }

    public function addMilestone(string $milestone, array $data = []): void
    {
        $milestones = $this->milestone_tracking ?? [];
        $milestones[] = [
            'milestone' => $milestone,
            'data' => $data,
            'achieved_at' => now()->toDateString()
        ];
        
        $this->update(['milestone_tracking' => $milestones]);
    }

    public function addInvestorNote(string $note): void
    {
        $existingNotes = $this->investor_notes ?? '';
        $newNote = "[" . now()->toDateString() . "] " . $note;
        
        $this->update([
            'investor_notes' => $existingNotes . "\n" . $newNote
        ]);
    }

    protected function calculateROI(?float $currentValuation = null): float
    {
        $valuation = $currentValuation ?? $this->current_valuation ?? $this->initial_investment;
        $totalReturn = $valuation + $this->realized_return;
        
        if ($this->initial_investment <= 0) {
            return 0;
        }
        
        return (($totalReturn - $this->initial_investment) / $this->initial_investment) * 100;
    }

    protected function logUpdate(string $type, array $data): void
    {
        $history = $this->update_history ?? [];
        $history[] = [
            'type' => $type,
            'data' => $data,
            'timestamp' => now()->toISOString()
        ];
        
        $this->update(['update_history' => $history]);
    }

    public function getLatestUpdate(): ?array
    {
        $history = $this->update_history ?? [];
        return end($history) ?: null;
    }

    public function getUpdatesByType(string $type): array
    {
        $history = $this->update_history ?? [];
        return array_filter($history, fn($update) => $update['type'] === $type);
    }

    public function isExited(): bool
    {
        return !is_null($this->actual_exit_date);
    }

    public function getDaysUntilExpectedExit(): ?int
    {
        if (!$this->expected_exit_date || $this->isExited()) {
            return null;
        }
        
        return now()->diffInDays($this->expected_exit_date, false);
    }

    public function getHoldingPeriodFormatted(): string
    {
        $months = $this->holding_period_months ?? 0;
        $years = intval($months / 12);
        $remainingMonths = $months % 12;
        
        if ($years > 0) {
            return $remainingMonths > 0 
                ? "{$years}y {$remainingMonths}m" 
                : "{$years}y";
        }
        
        return "{$remainingMonths}m";
    }
}