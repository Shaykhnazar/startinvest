<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\PortfolioTracking */
class PortfolioTrackingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'investor_id' => $this->investor_id,
            'startup_id' => $this->startup_id,
            'investment_id' => $this->investment_id,
            
            // Investment Metrics
            'initial_investment' => $this->initial_investment,
            'current_valuation' => $this->current_valuation,
            'paper_return' => $this->paper_return,
            'realized_return' => $this->realized_return,
            'roi_percentage' => $this->roi_percentage,
            'equity_percentage' => $this->equity_percentage,
            
            // Performance Tracking
            'performance_metrics' => $this->performance_metrics,
            'milestone_tracking' => $this->milestone_tracking,
            'last_valuation_date' => $this->last_valuation_date,
            'investment_stage' => $this->investment_stage,
            'current_status' => $this->current_status,
            
            // Risk Assessment
            'risk_score' => $this->risk_score,
            'risk_factors' => $this->risk_factors,
            'last_risk_assessment' => $this->last_risk_assessment,
            
            // Timeline Tracking
            'investment_date' => $this->investment_date,
            'expected_exit_date' => $this->expected_exit_date,
            'actual_exit_date' => $this->actual_exit_date,
            'holding_period_months' => $this->holding_period_months,
            
            // Notes and Updates
            'investor_notes' => $this->investor_notes,
            'update_history' => $this->update_history,
            'is_active' => $this->is_active,
            
            // Relationships
            'startup' => new StartupResource($this->whenLoaded('startup')),
            'investment' => new InvestmentResource($this->whenLoaded('investment')),
            
            // Timestamps
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}