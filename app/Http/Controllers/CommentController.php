<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return CommentResource::collection(Comment::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'body' => ['required'],
            'commentable_id' => ['required', 'integer'],
            'commentable_type' => ['required'],
        ]);

        return new CommentResource(Comment::create($data));
    }

    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    public function update(Request $request, Comment $comment)
    {
        $data = $request->validate([
            'body' => ['required'],
            'commentable_id' => ['required', 'integer'],
            'commentable_type' => ['required'],
        ]);

        $comment->update($data);

        return new CommentResource($comment);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json();
    }
}
