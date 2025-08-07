<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvestorPreferences extends Model
{
    protected $fillable = [
        'investor_id',
        'preferred_industries',
        'preferred_stages', 
        'min_investment_amount',
        'max_investment_amount',
        'preferred_locations',
        'risk_tolerance',
        'max_portfolio_companies',
        'target_portfolio_diversification',
        'exit_timeline_preferences',
        'receive_startup_matches',
        'receive_market_updates',
        'receive_portfolio_reports',
        'preferred_contact_method',
        'notification_frequency',
        'investment_thesis',
        'deal_evaluation_criteria',
        'co_investment_willing',
        'lead_investment_willing'
    ];

    protected $casts = [
        'preferred_industries' => 'array',
        'preferred_stages' => 'array',
        'preferred_locations' => 'array',
        'risk_tolerance' => 'array',
        'exit_timeline_preferences' => 'array',
        'notification_frequency' => 'array',
        'deal_evaluation_criteria' => 'array',
        'min_investment_amount' => 'decimal:2',
        'max_investment_amount' => 'decimal:2',
        'target_portfolio_diversification' => 'decimal:2',
        'receive_startup_matches' => 'boolean',
        'receive_market_updates' => 'boolean', 
        'receive_portfolio_reports' => 'boolean',
        'co_investment_willing' => 'boolean',
        'lead_investment_willing' => 'boolean'
    ];

    public function investor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'investor_id');
    }

    public function matchesIndustry(string $industry): bool
    {
        return in_array($industry, $this->preferred_industries ?: []);
    }

    public function matchesStage(string $stage): bool
    {
        return in_array($stage, $this->preferred_stages ?: []);
    }

    public function matchesLocation(string $location): bool
    {
        return in_array($location, $this->preferred_locations ?: []);
    }

    public function isAmountInRange(float $amount): bool
    {
        $minMatch = !$this->min_investment_amount || $amount >= $this->min_investment_amount;
        $maxMatch = !$this->max_investment_amount || $amount <= $this->max_investment_amount;
        
        return $minMatch && $maxMatch;
    }

    public function getRiskToleranceLevel(): string
    {
        if (!$this->risk_tolerance || empty($this->risk_tolerance)) {
            return 'medium';
        }

        // Return the first/primary risk tolerance level
        return $this->risk_tolerance[0] ?? 'medium';
    }

    public function isWillingToCoInvest(): bool
    {
        return $this->co_investment_willing ?? false;
    }

    public function isWillingToLead(): bool
    {
        return $this->lead_investment_willing ?? false;
    }

    public function acceptsNotificationType(string $type): bool
    {
        return match($type) {
            'startup_matches' => $this->receive_startup_matches,
            'market_updates' => $this->receive_market_updates,
            'portfolio_reports' => $this->receive_portfolio_reports,
            default => false
        };
    }
}