<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvestmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'startup' => new StartupResource($this->whenLoaded('startup')),
            'investor' => new UserResource($this->whenLoaded('investor')),
            'investment_stage' => $this->when($this->relationLoaded('investmentStage'), [
                'id' => $this->investmentStage?->id,
                'name' => $this->investmentStage?->name,
                'description' => $this->investmentStage?->description,
            ]),
            'amount' => [
                'value' => $this->amount,
                'formatted' => $this->formatCurrency($this->amount, $this->currency),
                'currency' => $this->currency,
            ],
            'equity_percentage' => $this->equity_percentage ? round($this->equity_percentage * 100, 2) : null,
            'status' => [
                'value' => $this->status,
                'label' => $this->getStatusLabel(),
                'color' => $this->getStatusColor(),
            ],
            'dates' => [
                'invested_at' => $this->invested_at?->toISOString(),
                'invested_at_formatted' => $this->invested_at?->format('M j, Y'),
                'exit_date' => $this->exit_date?->toISOString(),
                'exit_date_formatted' => $this->exit_date?->format('M j, Y'),
                'created_at' => $this->created_at->toISOString(),
                'updated_at' => $this->updated_at->toISOString(),
            ],
            'returns' => [
                'expected_return' => $this->expected_return,
                'expected_return_formatted' => $this->expected_return ? $this->formatCurrency($this->expected_return, $this->currency) : null,
                'actual_return' => $this->actual_return,
                'actual_return_formatted' => $this->actual_return ? $this->formatCurrency($this->actual_return, $this->currency) : null,
                'expected_roi' => round($this->getExpectedROI(), 2),
                'actual_roi' => round($this->calculateROI(), 2),
                'profit_loss' => $this->calculateProfitLoss(),
                'profit_loss_formatted' => $this->formatCurrency($this->calculateProfitLoss(), $this->currency),
            ],
            'performance' => [
                'score' => round($this->getPerformanceScore(), 1),
                'duration_days' => $this->getInvestmentDuration(),
                'is_profitable' => $this->calculateProfitLoss() > 0,
                'roi_vs_expected' => $this->getExpectedROI() > 0 ? 
                    round(($this->calculateROI() / $this->getExpectedROI()) * 100, 1) : null,
            ],
            'status_flags' => [
                'is_active' => $this->isActive(),
                'can_exit' => $this->canExit(),
                'due_diligence_completed' => $this->due_diligence_completed ?? false,
                'contract_signed' => $this->contract_signed ?? false,
                'payment_confirmed' => $this->payment_confirmed ?? false,
            ],
            'metadata' => [
                'notes' => $this->notes,
                'documents_count' => $this->whenCounted('investmentDocuments'),
                'updates_count' => $this->whenCounted('investmentUpdates'),
            ],
            'documents' => InvestmentDocumentResource::collection($this->whenLoaded('investmentDocuments')),
            'updates' => InvestmentUpdateResource::collection($this->whenLoaded('investmentUpdates')),
            'permissions' => $this->when($request->user(), function () use ($request) {
                return [
                    'can_view' => $request->user()->can('view', $this->resource),
                    'can_edit' => $request->user()->can('update', $this->resource),
                    'can_delete' => $request->user()->can('delete', $this->resource),
                ];
            }),
        ];
    }

    /**
     * Format currency value
     */
    private function formatCurrency(?float $amount, ?string $currency = 'USD'): ?string
    {
        if (is_null($amount)) {
            return null;
        }

        $symbols = [
            'USD' => '$',
            'EUR' => '€',
            'UZS' => 'UZS ',
            'RUB' => '₽',
        ];

        $symbol = $symbols[$currency ?? 'USD'] ?? $currency;
        
        if (in_array($currency, ['UZS'])) {
            return $symbol . number_format($amount, 0);
        }
        
        return $symbol . number_format($amount, 2);
    }
}