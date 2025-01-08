<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoteRequest;
use App\Http\Resources\VoteResource;
use App\Models\BlogPost;
use App\Services\BlogPostService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class PostReactionController extends Controller
{
    public function __construct(protected BlogPostService $blogPostService)
    {
    }

    public function store(VoteRequest $request, BlogPost $post): JsonResponse
    {
        $this->blogPostService->vote($post, $request->validated());

        return response()->json([
            'post' => $this->blogPostService->getBlogPostResource($post),
            'user_votes' => VoteResource::collection(UserService::getAuthUser(['votes'])->votes),
        ]);
    }
}
