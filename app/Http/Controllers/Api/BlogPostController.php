<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogPostResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\VoteResource;
use App\Models\BlogPost;
use App\Models\Comment;
use App\Services\BlogPostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\VoteRequest;

class BlogPostController extends Controller
{
    public function __construct(protected BlogPostService $blogPostService)
    {
    }

    public function comments(Request $request, BlogPost $post): JsonResponse
    {
        $comments = $post->comments()
            ->with('author')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json([
            'comments' => CommentResource::collection($comments)
        ]);
    }

    public function react(VoteRequest $request, BlogPost $post): JsonResponse
    {
        $this->blogPostService->vote($post, $request->validated());

        return response()->json([
            'post' => new BlogPostResource($post->fresh()),
            'user_votes' => VoteResource::collection(auth()->user()->votes)
        ]);
    }

    public function storeComment(CommentRequest $request, BlogPost $post): JsonResponse
    {
        $this->blogPostService->addComment($post, $request->validated());

        return response()->json([
            'post' => new BlogPostResource($post->fresh()),
            'user_comments' => CommentResource::collection(auth()->user()->comments)
        ]);
    }

    public function destroyComment(BlogPost $post, Comment $comment): JsonResponse
    {
        if ($comment->user_id !== auth()->id()) {
            abort(403);
        }

        $comment->delete();

        return response()->json([
            'post' => new BlogPostResource($post->fresh())
        ]);
    }
}
