<?php

namespace App\Http\Resources;

use App\Actions\DateFormatForHumans;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Idea */
class IdeaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'author' => new UserResource($this->author),
            'upvotes' => $this->upvotes,
            'downvotes' => $this->downvotes,
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'comments_count' => $this->whenCounted('comments'),
            'created_at' => DateFormatForHumans::run($this->created_at),
            'updated_at' => DateFormatForHumans::run($this->updated_at),
        ];
    }
}
