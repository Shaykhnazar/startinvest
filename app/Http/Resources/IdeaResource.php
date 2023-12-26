<?php

namespace App\Http\Resources;

use App\Enums\VoteTypeEnum;
use Carbon\CarbonInterface;
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
            $this->mergeWhen($request->user(), [
                'has_user_upvoted' => $request->user() && $this->hasUserVoted($request->user()->id, VoteTypeEnum::UP),
                'has_user_downvoted' => $request->user() && $this->hasUserVoted($request->user()->id, VoteTypeEnum::DOWN),
                'has_user_favorited' => $request->user() && $this->hasUserFavorited($request->user()->id),
            ]),
            'comments' => CommentResource::collection($this->comments),
            'created_at' => $this->created_at->diffForHumans(syntax: CarbonInterface::DIFF_ABSOLUTE, short: true),
            'updated_at' => $this->updated_at->diffForHumans(syntax: CarbonInterface::DIFF_ABSOLUTE, short: true),
        ];
    }
}
