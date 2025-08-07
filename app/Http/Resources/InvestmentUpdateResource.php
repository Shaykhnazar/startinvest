<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvestmentUpdateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'content_excerpt' => $this->getContentExcerpt(),
            'update_type' => [
                'value' => $this->update_type,
                'label' => $this->getUpdateTypeLabel(),
                'color' => $this->getUpdateTypeColor(),
            ],
            'creator' => new UserResource($this->whenLoaded('creator')),
            'flags' => [
                'is_milestone' => $this->is_milestone,
                'has_financial_impact' => $this->hasFinancialImpact(),
            ],
            'financial' => [
                'impact' => $this->financial_impact,
                'impact_formatted' => $this->financial_impact ? 
                    ($this->financial_impact >= 0 ? '+' : '') . number_format($this->financial_impact, 2) : null,
                'impact_type' => $this->financial_impact ? 
                    ($this->financial_impact >= 0 ? 'positive' : 'negative') : null,
            ],
            'visibility' => [
                'value' => $this->visibility,
                'is_public' => $this->visibility === 'public',
                'is_private' => $this->visibility === 'private',
                'is_investors_only' => $this->visibility === 'investors_only',
            ],
            'engagement' => [
                'likes_count' => $this->likes_count ?? 0,
                'comments_count' => $this->comments_count ?? 0,
            ],
            'attachments' => $this->attachments,
            'metrics' => $this->metrics,
            'dates' => [
                'published_at' => $this->published_at?->toISOString(),
                'published_at_formatted' => $this->published_at?->format('M j, Y g:i A'),
                'created_at' => $this->created_at->toISOString(),
                'created_at_formatted' => $this->created_at->format('M j, Y g:i A'),
                'updated_at' => $this->updated_at->toISOString(),
                'time_ago' => $this->created_at->diffForHumans(),
            ],
            'permissions' => $this->when($request->user(), function () use ($request) {
                return [
                    'can_view' => $this->visibility === 'public' || 
                        $request->user()->can('view', $this->investment) ||
                        $request->user()->id === $this->created_by,
                    'can_edit' => $request->user()->id === $this->created_by ||
                        $request->user()->can('update', $this->investment),
                    'can_delete' => $request->user()->id === $this->created_by ||
                        $request->user()->can('delete', $this->investment),
                ];
            }),
        ];
    }

    /**
     * Get content excerpt
     */
    private function getContentExcerpt(int $length = 150): string
    {
        if (strlen($this->content) <= $length) {
            return $this->content;
        }

        return substr($this->content, 0, $length) . '...';
    }
}