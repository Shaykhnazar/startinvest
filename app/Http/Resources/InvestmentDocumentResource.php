<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvestmentDocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'document_type' => [
                'value' => $this->document_type,
                'label' => $this->getDocumentTypeLabel(),
            ],
            'file' => [
                'name' => $this->file_name,
                'path' => $this->file_path,
                'size' => $this->file_size,
                'size_formatted' => $this->getFileSizeFormatted(),
                'mime_type' => $this->mime_type,
            ],
            'uploader' => new UserResource($this->whenLoaded('uploader')),
            'metadata' => [
                'is_confidential' => $this->is_confidential,
                'version' => $this->version,
                'metadata' => $this->metadata,
            ],
            'dates' => [
                'signed_at' => $this->signed_at?->toISOString(),
                'signed_at_formatted' => $this->signed_at?->format('M j, Y g:i A'),
                'expires_at' => $this->expires_at?->toISOString(),
                'expires_at_formatted' => $this->expires_at?->format('M j, Y'),
                'created_at' => $this->created_at->toISOString(),
                'updated_at' => $this->updated_at->toISOString(),
            ],
            'status' => [
                'is_signed' => $this->isSigned(),
                'is_expired' => $this->isExpired(),
                'days_until_expiry' => $this->expires_at ? 
                    max(0, now()->diffInDays($this->expires_at, false)) : null,
            ],
            'permissions' => $this->when($request->user(), function () use ($request) {
                return [
                    'can_view' => !$this->is_confidential || 
                        $request->user()->can('view', $this->investment) ||
                        $request->user()->id === $this->uploaded_by,
                    'can_download' => !$this->is_confidential || 
                        $request->user()->can('view', $this->investment) ||
                        $request->user()->id === $this->uploaded_by,
                    'can_edit' => $request->user()->id === $this->uploaded_by ||
                        $request->user()->can('update', $this->investment),
                    'can_delete' => $request->user()->id === $this->uploaded_by ||
                        $request->user()->can('delete', $this->investment),
                ];
            }),
        ];
    }
}