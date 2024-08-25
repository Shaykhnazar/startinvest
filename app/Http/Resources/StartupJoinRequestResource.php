<?php

namespace App\Http\Resources;

use App\Actions\DateFormatForHumans;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StartupJoinRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'startup_id' => $this->startup_id,
            'status' => $this->status,
            'created_at' => DateFormatForHumans::run($this->created_at),
            'updated_at' => DateFormatForHumans::run($this->updated_at),
            'decision_at' => $this->decision_at ? DateFormatForHumans::run($this->decision_at) : null,
            'user' => new UserResource($this->whenLoaded('user')), // Assuming you have a UserResource
            'startup' => new StartupResource($this->whenLoaded('startup')), // Assuming you have a StartupResource
        ];
    }
}
