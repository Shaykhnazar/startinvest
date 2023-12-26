<?php

namespace App\Http\Controllers\Api;

use App\Enums\VoteTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\IdeaStoreRequest;
use App\Http\Requests\IdeaUpdateRequest;
use App\Http\Resources\IdeaResource;
use App\Models\Idea;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(IdeaStoreRequest $request): JsonResponse
    {
        return response()->json([
            'idea' => new IdeaResource(
                Idea::create([
                    ...$request->validated()
                ])
            ),
        ]);
    }

    public function update(IdeaUpdateRequest $request, Idea $idea)
    {
        $idea->update($request->validated());

        return response()->json([
            'idea' => IdeaResource::make($idea),
        ]);
    }

    public function destroy(Idea $idea)
    {
        $idea->delete();
        return response()->json([
            'idea' => ['id' => $idea->id],
        ]);
    }

    public function vote(Request $request, Idea $idea): JsonResponse
    {
        $type = $request->get('type') === 'up' ? VoteTypeEnum::UP : VoteTypeEnum::DOWN; // 'up' or 'down'
        $userId = $request->get('user_id');

        // Check if the user has already voted in the opposite direction
        if ($idea->hasUserVoted($userId, $type === VoteTypeEnum::UP ? VoteTypeEnum::DOWN : VoteTypeEnum::UP)) {
            // Undo the previous vote
            $idea->undoVote($userId);
        }
        // Record the new vote
        $idea->vote($userId, $type);

        return response()->json(['idea' => new IdeaResource($idea)]);
    }

    public function favorite(Request $request, Idea $idea)
    {
        $idea->toggleFavorite($request->user()->id);

        return response()->json(['idea' => new IdeaResource($idea)]);
    }


//    public function addCommentToIdea(Request $request, Idea $idea)
//    {
//        $comment = new Comment([
//            'body' => $request->input('body'),
//        ]);
//
//        $idea->comments()->save($comment);
//
//        return redirect()->back();
//    }
}
