<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvestmentRound extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'startup_id',
        'stage_id',
        'name',
        'round_type',
        'target_amount',
        'raised_amount',
        'min_investment',
        'max_investment',
        'price_per_share',
        'pre_money_valuation',
        'post_money_valuation',
        'total_shares',
        'shares_offered',
        'deadline',
        'status',
        'description',
        'terms_summary',
        'use_of_funds',
        'investor_perks',
        'required_documents',
        'risk_factors',
        'legal_structure',
        'securities_type',
        'minimum_commitment',
        'is_accredited_only',
        'geographical_restrictions',
        'launched_at',
        'closed_at',
        'success_fee_percentage',
        'platform_fee',
        'notes'
    ];

    protected $casts = [
        'target_amount' => 'decimal:2',
        'raised_amount' => 'decimal:2',
        'min_investment' => 'decimal:2',
        'max_investment' => 'decimal:2',
        'price_per_share' => 'decimal:4',
        'pre_money_valuation' => 'decimal:2',
        'post_money_valuation' => 'decimal:2',
        'success_fee_percentage' => 'decimal:2',
        'platform_fee' => 'decimal:2',
        'deadline' => 'datetime',
        'launched_at' => 'datetime',
        'closed_at' => 'datetime',
        'use_of_funds' => 'array',
        'investor_perks' => 'array',
        'required_documents' => 'array',
        'risk_factors' => 'array',
        'geographical_restrictions' => 'array',
        'is_accredited_only' => 'boolean'
    ];

    public function startup(): BelongsTo
    {
        return $this->belongsTo(Startup::class);
    }

    public function stage(): BelongsTo
    {
        return $this->belongsTo(InvestmentStage::class, 'stage_id');
    }

    public function investments(): HasMany
    {
        return $this->hasMany(Investment::class, 'investment_round_id');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(InvestmentDocument::class, 'investment_round_id');
    }

    public function updates(): HasMany
    {
        return $this->hasMany(InvestmentUpdate::class, 'investment_round_id');
    }

    // Scopes
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    public function scopeOpen(Builder $query): Builder
    {
        return $query->whereIn('status', ['active', 'open']);
    }

    public function scopeClosed(Builder $query): Builder
    {
        return $query->where('status', 'closed');
    }

    public function scopeSuccessful(Builder $query): Builder
    {
        return $query->where('status', 'successful');
    }

    public function scopeFailed(Builder $query): Builder
    {
        return $query->where('status', 'failed');
    }

    public function scopeByStage(Builder $query, string $stage): Builder
    {
        return $query->whereHas('stage', function ($q) use ($stage) {
            $q->where('slug', $stage);
        });
    }

    public function scopeByRoundType(Builder $query, string $roundType): Builder
    {
        return $query->where('round_type', $roundType);
    }

    public function scopeInAmountRange(Builder $query, float $minAmount = null, float $maxAmount = null): Builder
    {
        if ($minAmount !== null) {
            $query->where('target_amount', '>=', $minAmount);
        }
        
        if ($maxAmount !== null) {
            $query->where('target_amount', '<=', $maxAmount);
        }
        
        return $query;
    }

    public function scopeDeadlineAfter(Builder $query, \DateTime $date = null): Builder
    {
        $date = $date ?? now();
        return $query->where('deadline', '>', $date);
    }

    public function scopeDeadlineBefore(Builder $query, \DateTime $date = null): Builder
    {
        $date = $date ?? now();
        return $query->where('deadline', '<', $date);
    }

    // Accessors & Mutators
    public function getProgressPercentageAttribute(): float
    {
        if (!$this->target_amount || $this->target_amount <= 0) {
            return 0;
        }
        
        return min(100, ($this->raised_amount / $this->target_amount) * 100);
    }

    public function getRemainingAmountAttribute(): float
    {
        return max(0, $this->target_amount - $this->raised_amount);
    }

    public function getRemainingDaysAttribute(): ?int
    {
        if (!$this->deadline) {
            return null;
        }
        
        $days = now()->diffInDays($this->deadline, false);
        return $days >= 0 ? $days : 0;
    }

    public function getInvestorsCountAttribute(): int
    {
        return $this->investments()->distinct('investor_id')->count();
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'active', 'open' => 'green',
            'closed' => 'blue',
            'successful' => 'green',
            'failed', 'cancelled' => 'red',
            'draft' => 'gray',
            default => 'gray'
        };
    }

    public function getFormattedTargetAmountAttribute(): string
    {
        return $this->formatCurrency($this->target_amount);
    }

    public function getFormattedRaisedAmountAttribute(): string
    {
        return $this->formatCurrency($this->raised_amount);
    }

    public function getFormattedRemainingAmountAttribute(): string
    {
        return $this->formatCurrency($this->remaining_amount);
    }

    public function getFormattedValuationAttribute(): string
    {
        if ($this->post_money_valuation) {
            return $this->formatCurrency($this->post_money_valuation);
        }
        
        if ($this->pre_money_valuation) {
            return $this->formatCurrency($this->pre_money_valuation) . ' (pre-money)';
        }
        
        return 'Not specified';
    }

    // Methods
    public function isActive(): bool
    {
        return in_array($this->status, ['active', 'open']);
    }

    public function isClosed(): bool
    {
        return in_array($this->status, ['closed', 'successful', 'failed']);
    }

    public function isSuccessful(): bool
    {
        return $this->status === 'successful' || $this->progress_percentage >= 100;
    }

    public function canAcceptInvestments(): bool
    {
        return $this->isActive() && 
               ($this->deadline === null || $this->deadline->isFuture()) &&
               $this->raised_amount < $this->target_amount;
    }

    public function isOversubscribed(): bool
    {
        return $this->raised_amount > $this->target_amount;
    }

    public function isNearDeadline(int $days = 7): bool
    {
        return $this->deadline && 
               $this->deadline->isFuture() && 
               now()->diffInDays($this->deadline) <= $days;
    }

    public function addInvestment(float $amount, int $investorId, array $additionalData = []): Investment
    {
        if (!$this->canAcceptInvestments()) {
            throw new \Exception('This round is not accepting investments');
        }

        if ($amount < $this->min_investment) {
            throw new \Exception("Minimum investment is {$this->formatCurrency($this->min_investment)}");
        }

        if ($this->max_investment && $amount > $this->max_investment) {
            throw new \Exception("Maximum investment is {$this->formatCurrency($this->max_investment)}");
        }

        $investment = $this->investments()->create(array_merge([
            'startup_id' => $this->startup_id,
            'investor_id' => $investorId,
            'investment_stage_id' => $this->stage_id,
            'amount' => $amount,
            'status' => 'pending',
            'invested_at' => now()
        ], $additionalData));

        $this->updateRaisedAmount();
        return $investment;
    }

    public function updateRaisedAmount(): void
    {
        $totalRaised = $this->investments()
            ->whereIn('status', ['confirmed', 'active', 'successful'])
            ->sum('amount');
        
        $this->update(['raised_amount' => $totalRaised]);
        
        // Auto-close if target reached
        if ($totalRaised >= $this->target_amount && $this->isActive()) {
            $this->markAsSuccessful();
        }
    }

    public function markAsSuccessful(): void
    {
        $this->update([
            'status' => 'successful',
            'closed_at' => now()
        ]);

        // Update all related investments to active status
        $this->investments()
            ->where('status', 'confirmed')
            ->update(['status' => 'active']);

        // Create success update
        $this->updates()->create([
            'title' => 'Funding Round Successful',
            'content' => "Successfully raised {$this->formatted_raised_amount} out of {$this->formatted_target_amount} target.",
            'type' => 'milestone',
            'is_public' => true
        ]);
    }

    public function close(string $reason = null): void
    {
        $status = $this->raised_amount >= $this->target_amount ? 'successful' : 'closed';
        
        $this->update([
            'status' => $status,
            'closed_at' => now(),
            'notes' => $reason ? $this->notes . "\nClosed: " . $reason : $this->notes
        ]);

        if ($status === 'successful') {
            $this->markAsSuccessful();
        }
    }

    public function extend(\DateTime $newDeadline, string $reason = null): void
    {
        if ($this->isClosed()) {
            throw new \Exception('Cannot extend a closed round');
        }

        $oldDeadline = $this->deadline;
        
        $this->update([
            'deadline' => $newDeadline,
            'notes' => $reason ? $this->notes . "\nExtended until {$newDeadline->format('Y-m-d')}: " . $reason : $this->notes
        ]);

        // Notify investors of extension
        $this->updates()->create([
            'title' => 'Funding Round Extended',
            'content' => "Round deadline extended from {$oldDeadline->format('M j, Y')} to {$newDeadline->format('M j, Y')}." . ($reason ? " Reason: $reason" : ''),
            'type' => 'announcement',
            'is_public' => true
        ]);
    }

    public function getInvestmentStats(): array
    {
        $investments = $this->investments();
        
        return [
            'total_investors' => $investments->distinct('investor_id')->count(),
            'total_raised' => $investments->whereIn('status', ['confirmed', 'active'])->sum('amount'),
            'average_investment' => $investments->whereIn('status', ['confirmed', 'active'])->avg('amount') ?? 0,
            'largest_investment' => $investments->whereIn('status', ['confirmed', 'active'])->max('amount') ?? 0,
            'smallest_investment' => $investments->whereIn('status', ['confirmed', 'active'])->min('amount') ?? 0,
            'pending_investments' => $investments->where('status', 'pending')->count(),
            'confirmed_investments' => $investments->where('status', 'confirmed')->count()
        ];
    }

    public function getDueDiligenceDocuments(): array
    {
        return $this->documents()
            ->where('category', 'due_diligence')
            ->where('is_public', true)
            ->get()
            ->toArray();
    }

    public function getLegalDocuments(): array
    {
        return $this->documents()
            ->where('category', 'legal')
            ->where('is_public', true)
            ->get()
            ->toArray();
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
    public static function getActiveRounds(): \Illuminate\Database\Eloquent\Collection
    {
        return static::active()
            ->with(['startup', 'stage'])
            ->where('deadline', '>', now())
            ->orderBy('deadline')
            ->get();
    }

    public static function getFeaturedRounds(int $limit = 6): \Illuminate\Database\Eloquent\Collection
    {
        return static::active()
            ->with(['startup', 'stage'])
            ->where('deadline', '>', now())
            ->orderByDesc('raised_amount')
            ->limit($limit)
            ->get();
    }

    public static function getEndingSoonRounds(int $days = 7): \Illuminate\Database\Eloquent\Collection
    {
        return static::active()
            ->with(['startup', 'stage'])
            ->where('deadline', '>', now())
            ->where('deadline', '<=', now()->addDays($days))
            ->orderBy('deadline')
            ->get();
    }
}