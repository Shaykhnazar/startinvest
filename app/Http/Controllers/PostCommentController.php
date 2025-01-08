<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\BlogPost;
use App\Models\Comment;
use App\Services\BlogPostService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class PostCommentController extends Controller
{
    public function __construct(protected BlogPostService $blogPostService)
    {
    }

    public function index(BlogPost $post): JsonResponse
    {
        $comments = $post->comments()->with('author')->paginate(10);

        return response()->json([
            'comments' => CommentResource::collection($comments),
        ]);
    }

    public function store(CommentRequest $request, BlogPost $post): JsonResponse
    {
        $this->blogPostService->addComment($post, $request->validated());

        return response()->json([
            'post' => $this->blogPostService->getBlogPostResource($post),
            'user_comments' => CommentResource::collection(UserService::getAuthUser(['comments'])->comments),
        ]);
    }

    public function destroy(BlogPost $post, Comment $comment): JsonResponse
    {
        if ($comment->user_id !== auth()->id()) {
            abort(403);
        }

        $comment->delete();

        return response()->json([
            'post' => $this->blogPostService->getBlogPostResource($post),
        ]);
    }
}
