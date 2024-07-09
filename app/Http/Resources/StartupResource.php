<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Startup */
class StartupResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'additional_information' => $this->additional_information,
            'start_date' => $this->start_date,
            'has_mvp' => $this->has_mvp,
            'type' => $this->type,
            'status' => $this->status,
            'owner_id' => $this->owner_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'trashed' => $this->trashed(),
            $this->mergeWhen($request->with_content, [
                'description' => $this->description,
            ]),
        ];
    }
}
