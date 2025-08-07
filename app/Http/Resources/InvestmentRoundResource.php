<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\InvestmentRound */
class InvestmentRoundResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'startup_id' => $this->startup_id,
            'stage_id' => $this->stage_id,
            
            // Basic Information
            'name' => $this->name,
            'round_type' => $this->round_type,
            'status' => $this->status,
            'status_color' => $this->status_color,
            
            // Financial Details
            'target_amount' => $this->target_amount,
            'raised_amount' => $this->raised_amount,
            'remaining_amount' => $this->remaining_amount,
            'progress_percentage' => $this->progress_percentage,
            'min_investment' => $this->min_investment,
            'max_investment' => $this->max_investment,
            
            // Formatted Financial Values
            'formatted_target_amount' => $this->formatted_target_amount,
            'formatted_raised_amount' => $this->formatted_raised_amount,
            'formatted_remaining_amount' => $this->formatted_remaining_amount,
            
            // Valuation
            'price_per_share' => $this->price_per_share,
            'pre_money_valuation' => $this->pre_money_valuation,
            'post_money_valuation' => $this->post_money_valuation,
            'formatted_valuation' => $this->formatted_valuation,
            'total_shares' => $this->total_shares,
            'shares_offered' => $this->shares_offered,
            
            // Timeline
            'deadline' => $this->deadline,
            'remaining_days' => $this->remaining_days,
            'launched_at' => $this->launched_at,
            'closed_at' => $this->closed_at,
            
            // Content
            'description' => $this->description,
            'terms_summary' => $this->terms_summary,
            'use_of_funds' => $this->use_of_funds,
            'investor_perks' => $this->investor_perks,
            'required_documents' => $this->required_documents,
            'risk_factors' => $this->risk_factors,
            
            // Legal & Compliance
            'legal_structure' => $this->legal_structure,
            'securities_type' => $this->securities_type,
            'minimum_commitment' => $this->minimum_commitment,
            'is_accredited_only' => $this->is_accredited_only,
            'geographical_restrictions' => $this->geographical_restrictions,
            
            // Platform Details
            'success_fee_percentage' => $this->success_fee_percentage,
            'platform_fee' => $this->platform_fee,
            'notes' => $this->notes,
            
            // Computed Properties
            'investors_count' => $this->investors_count,
            'is_active' => $this->isActive(),
            'is_closed' => $this->isClosed(),
            'is_successful' => $this->isSuccessful(),
            'can_accept_investments' => $this->canAcceptInvestments(),
            'is_oversubscribed' => $this->isOversubscribed(),
            'is_near_deadline' => $this->isNearDeadline(),
            
            // Relationships
            'startup' => new StartupResource($this->whenLoaded('startup')),
            'stage' => new InvestmentStageResource($this->whenLoaded('stage')),
            'investments' => InvestmentResource::collection($this->whenLoaded('investments')),
            'documents' => InvestmentDocumentResource::collection($this->whenLoaded('documents')),
            'updates' => InvestmentUpdateResource::collection($this->whenLoaded('updates')),
            
            // Recent investors (limited for privacy)
            'recent_investors' => $this->when(
                $this->relationLoaded('investments'),
                function () {
                    return $this->investments()
                        ->with('investor:id,name,avatar,company')
                        ->where('status', '!=', 'cancelled')
                        ->latest()
                        ->limit(10)
                        ->get()
                        ->map(function ($investment) {
                            return [
                                'investor_name' => $investment->investor->name,
                                'investor_avatar' => $investment->investor->avatar,
                                'investor_company' => $investment->investor->company,
                                'amount' => $investment->amount, // This might be hidden in some contexts
                                'invested_at' => $investment->created_at
                            ];
                        });
                }
            ),
            
            // Investment statistics (for round owners and admins)
            'investment_stats' => $this->when(
                $request->user() && 
                ($request->user()->can('view', $this->resource) || 
                 $request->user()->hasRole('admin')),
                function () {
                    return $this->getInvestmentStats();
                }
            ),
            
            // Due diligence documents (public)
            'due_diligence_documents' => $this->getDueDiligenceDocuments(),
            
            // Legal documents (public)
            'legal_documents' => $this->getLegalDocuments(),
            
            // Timestamps
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at
        ];
    }

    public function with(Request $request): array
    {
        return [
            'meta' => [
                'can_invest' => $request->user() && 
                               $request->user()->is_investor && 
                               $this->canAcceptInvestments() &&
                               !$this->investments()->where('investor_id', $request->user()->id)->exists(),
                'user_investment' => $request->user() ? 
                    $this->investments()
                         ->where('investor_id', $request->user()->id)
                         ->first() : null,
                'is_owner' => $request->user() && 
                             $this->startup && 
                             $this->startup->owner_id === $request->user()->id,
                'can_edit' => $request->user() && 
                             $request->user()->can('update', $this->resource)
            ]
        ];
    }
}