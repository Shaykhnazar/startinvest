<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class InvestorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'bio' => $this->bio,
            'location' => $this->location,
            'company' => $this->company,
            'position' => $this->position,
            'website' => $this->website,
            'linkedin_profile' => $this->linkedin_profile,
            'twitter_profile' => $this->twitter_profile,
            'is_investor' => $this->is_investor,
            'is_verified' => $this->is_verified,
            
            // Investor-specific fields
            'investment_focus' => $this->investment_focus,
            'investment_stage_focus' => $this->investment_stage_focus,
            'investment_size_min' => $this->investment_size_min,
            'investment_size_max' => $this->investment_size_max,
            'portfolio_size' => $this->portfolio_size,
            'investment_experience_years' => $this->investment_experience_years,
            'notable_investments' => $this->notable_investments,
            'investment_thesis' => $this->investment_thesis,
            'preferred_contact_method' => $this->preferred_contact_method,
            'accepts_unsolicited_pitches' => $this->accepts_unsolicited_pitches,
            'response_time_days' => $this->response_time_days,
            'co_investment_interested' => $this->co_investment_interested,
            'mentorship_available' => $this->mentorship_available,
            
            // Computed attributes
            'total_investments' => $this->whenLoaded('investments', function () {
                return $this->investments->count();
            }),
            
            'total_invested' => $this->whenLoaded('investments', function () {
                return $this->investments->sum('amount');
            }),
            
            'portfolio_companies' => $this->whenLoaded('investments', function () {
                return $this->investments->pluck('startup_id')->unique()->count();
            }),
            
            'average_investment' => $this->whenLoaded('investments', function () {
                return $this->investments->avg('amount');
            }),
            
            'portfolio_roi' => $this->when($this->relationLoaded('investments'), function () {
                return $this->calculatePortfolioROI();
            }),
            
            'risk_score' => $this->when($this->relationLoaded('investments'), function () {
                return $this->calculateRiskScore();
            }),
            
            'diversification_score' => $this->when($this->relationLoaded('investments'), function () {
                return $this->calculateDiversificationScore();
            }),
            
            // Relationships
            'investments' => InvestmentResource::collection($this->whenLoaded('investments')),
            'preferences' => new InvestorPreferencesResource($this->whenLoaded('investorPreferences')),
            'portfolio_tracking' => PortfolioTrackingResource::collection($this->whenLoaded('portfolioTracking')),
            
            // Timestamps
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'email_verified_at' => $this->email_verified_at,
            'last_active_at' => $this->last_active_at,
        ];
    }
}
