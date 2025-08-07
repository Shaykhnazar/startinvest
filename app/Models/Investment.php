<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Carbon\Carbon;

class Investment extends Model
{
    use AsSource, Filterable, Attachable, SoftDeletes;

    protected $fillable = [
        'startup_id',
        'investor_id',
        'investment_stage_id',
        'investment_round_id',
        'amount',
        'equity_percentage',
        'status',
        'invested_at',
        'confirmed_at',
        'expected_return',
        'actual_return',
        'exit_date',
        'notes',
        'documents',
        'due_diligence_completed',
        'contract_signed',
        'payment_confirmed'
    ];

    protected $casts = [
        'invested_at' => 'datetime',
        'confirmed_at' => 'datetime',
        'exit_date' => 'datetime',
        'amount' => 'decimal:2',
        'equity_percentage' => 'decimal:4',
        'expected_return' => 'decimal:2',
        'actual_return' => 'decimal:2',
        'documents' => 'array',
        'due_diligence_completed' => 'boolean',
        'contract_signed' => 'boolean',
        'payment_confirmed' => 'boolean'
    ];

    // Relationships
    public function startup(): BelongsTo
    {
        return $this->belongsTo(Startup::class);
    }

    public function investor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'investor_id');
    }

    public function investmentStage(): BelongsTo
    {
        return $this->belongsTo(InvestmentStage::class);
    }

    public function investmentRound(): BelongsTo
    {
        return $this->belongsTo(InvestmentRound::class);
    }

    public function portfolioTracking(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PortfolioTracking::class);
    }

    public function investmentDocuments(): HasMany
    {
        return $this->hasMany(InvestmentDocument::class);
    }

    public function investmentUpdates(): HasMany
    {
        return $this->hasMany(InvestmentUpdate::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeByAmountRange($query, $min, $max)
    {
        return $query->whereBetween('amount', [$min, $max]);
    }

    public function scopeByInvestor($query, $investorId)
    {
        return $query->where('investor_id', $investorId);
    }

    public function scopeByStartup($query, $startupId)
    {
        return $query->where('startup_id', $startupId);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Business Logic Methods
    public function calculateROI(): float
    {
        if (!$this->actual_return || $this->amount <= 0) {
            return 0;
        }

        return (($this->actual_return - $this->amount) / $this->amount) * 100;
    }

    public function calculateProfitLoss(): float
    {
        return $this->actual_return - $this->amount;
    }

    public function getInvestmentDuration(): ?int
    {
        if (!$this->invested_at) {
            return null;
        }

        $endDate = $this->exit_date ?? now();
        return $this->invested_at->diffInDays($endDate);
    }

    public function getExpectedROI(): float
    {
        if (!$this->expected_return || $this->amount <= 0) {
            return 0;
        }

        return (($this->expected_return - $this->amount) / $this->amount) * 100;
    }

    public function getStatusLabel(): string
    {
        return match($this->status) {
            'pending' => 'Pending Review',
            'approved' => 'Approved',
            'active' => 'Active Investment',
            'completed' => 'Completed',
            'cancelled' => 'Cancelled',
            'exited' => 'Exited',
            default => 'Unknown'
        };
    }

    public function getStatusColor(): string
    {
        return match($this->status) {
            'pending' => 'warning',
            'approved' => 'info',
            'active' => 'success',
            'completed' => 'primary',
            'cancelled' => 'danger',
            'exited' => 'secondary',
            default => 'secondary'
        };
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function canExit(): bool
    {
        return in_array($this->status, ['active', 'completed']) && !$this->exit_date;
    }

    public function getPerformanceScore(): float
    {
        $roi = $this->calculateROI();
        $expectedRoi = $this->getExpectedROI();
        
        if ($expectedRoi <= 0) {
            return $roi >= 0 ? 100 : 0;
        }
        
        return min(100, max(0, ($roi / $expectedRoi) * 100));
    }
}
