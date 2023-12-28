<?php

namespace App\Http\Resources;

use App\Actions\DateFormatForHumans;
use App\Enums\VoteTypeEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Idea */
class IdeaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
//        TODO: Remove has_user_upvoted, has_user_downvoted and has_user_favorited from here and refactor it
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
            'comments_count' => $this->comments_count,
            'created_at' => DateFormatForHumans::run($this->created_at),
            'updated_at' => DateFormatForHumans::run($this->updated_at),
        ];
    }
}
