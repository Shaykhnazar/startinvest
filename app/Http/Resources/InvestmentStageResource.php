<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\InvestmentStage */
class InvestmentStageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'order_index' => $this->order_index,
            
            // Funding characteristics
            'min_funding_amount' => $this->min_funding_amount,
            'max_funding_amount' => $this->max_funding_amount,
            'formatted_funding_range' => $this->formatted_funding_range,
            'typical_duration_months' => $this->typical_duration_months,
            
            // Stage characteristics
            'key_milestones' => $this->key_milestones,
            'investor_types' => $this->investor_types,
            'equity_range_min' => $this->equity_range_min,
            'equity_range_max' => $this->equity_range_max,
            'formatted_equity_range' => $this->formatted_equity_range,
            
            // Risk and success
            'risk_level' => $this->risk_level,
            'risk_level_color' => $this->risk_level_color,
            'success_rate' => $this->success_rate,
            'success_rate_color' => $this->success_rate_color,
            
            // Status
            'is_active' => $this->is_active,
            
            // Stage categorization
            'is_early_stage' => $this->isEarlyStage(),
            'is_growth_stage' => $this->isGrowthStage(),
            'is_late_stage' => $this->isLateStage(),
            
            // Navigation
            'next_stage' => $this->when($this->getNextStage(), function () {
                return [
                    'id' => $this->getNextStage()->id,
                    'name' => $this->getNextStage()->name,
                    'slug' => $this->getNextStage()->slug
                ];
            }),
            'previous_stage' => $this->when($this->getPreviousStage(), function () {
                return [
                    'id' => $this->getPreviousStage()->id,
                    'name' => $this->getPreviousStage()->name,
                    'slug' => $this->getPreviousStage()->slug
                ];
            }),
            
            // Investment metrics (when loaded)
            'investment_metrics' => $this->when(
                $request->has('include_metrics'),
                fn() => $this->getInvestmentMetrics()
            ),
            
            // Timestamps
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}