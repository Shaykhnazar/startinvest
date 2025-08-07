<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Screen\AsSource;

class InvestmentUpdate extends Model
{
    use AsSource, SoftDeletes;

    protected $fillable = [
        'investment_id',
        'title',
        'content',
        'update_type',
        'created_by',
        'is_milestone',
        'financial_impact',
        'visibility'
    ];

    protected $casts = [
        'is_milestone' => 'boolean',
        'financial_impact' => 'decimal:2'
    ];

    // Relationships
    public function investment(): BelongsTo
    {
        return $this->belongsTo(Investment::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Scopes
    public function scopeByType($query, $type)
    {
        return $query->where('update_type', $type);
    }

    public function scopeMilestones($query)
    {
        return $query->where('is_milestone', true);
    }

    public function scopePublic($query)
    {
        return $query->where('visibility', 'public');
    }

    public function scopePrivate($query)
    {
        return $query->where('visibility', 'private');
    }

    // Methods
    public function getUpdateTypeLabel(): string
    {
        return match($this->update_type) {
            'progress' => 'Progress Update',
            'financial' => 'Financial Update',
            'milestone' => 'Milestone Achievement',
            'challenge' => 'Challenge Update',
            'opportunity' => 'New Opportunity',
            'team' => 'Team Update',
            'product' => 'Product Update',
            'market' => 'Market Update',
            default => 'General Update'
        };
    }

    public function getUpdateTypeColor(): string
    {
        return match($this->update_type) {
            'progress' => 'success',
            'financial' => 'primary',
            'milestone' => 'warning',
            'challenge' => 'danger',
            'opportunity' => 'info',
            'team' => 'secondary',
            'product' => 'success',
            'market' => 'info',
            default => 'secondary'
        };
    }

    public function isMilestone(): bool
    {
        return $this->is_milestone === true;
    }

    public function hasFinancialImpact(): bool
    {
        return !is_null($this->financial_impact) && $this->financial_impact != 0;
    }
}