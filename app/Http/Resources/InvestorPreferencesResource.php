<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\InvestorPreferences */
class InvestorPreferencesResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'investor_id' => $this->investor_id,
            
            // Investment Preferences
            'preferred_industries' => $this->preferred_industries,
            'preferred_stages' => $this->preferred_stages,
            'min_investment_amount' => $this->min_investment_amount,
            'max_investment_amount' => $this->max_investment_amount,
            'preferred_locations' => $this->preferred_locations,
            'risk_tolerance' => $this->risk_tolerance,
            
            // Portfolio Preferences
            'max_portfolio_companies' => $this->max_portfolio_companies,
            'target_portfolio_diversification' => $this->target_portfolio_diversification,
            'exit_timeline_preferences' => $this->exit_timeline_preferences,
            
            // Communication Preferences
            'receive_startup_matches' => $this->receive_startup_matches,
            'receive_market_updates' => $this->receive_market_updates,
            'receive_portfolio_reports' => $this->receive_portfolio_reports,
            'preferred_contact_method' => $this->preferred_contact_method,
            'notification_frequency' => $this->notification_frequency,
            
            // Investment Strategy
            'investment_thesis' => $this->investment_thesis,
            'deal_evaluation_criteria' => $this->deal_evaluation_criteria,
            'co_investment_willing' => $this->co_investment_willing,
            'lead_investment_willing' => $this->lead_investment_willing,
            
            // Timestamps
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}