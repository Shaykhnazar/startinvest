<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'avatar' => $this->avatar ?? '',
            'votes' => VoteResource::collection($this->whenLoaded('votes')),
            'favorites' => FavoriteResource::collection($this->whenLoaded('favorites')),
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'joinRequests' => StartupJoinRequestResource::collection($this->whenLoaded('joinRequests')),
            'contributedStartups' => StartupResource::collection($this->whenLoaded('contributedStartups')),
        ];
    }
}
