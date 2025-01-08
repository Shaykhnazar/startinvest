<?php

namespace App\Services;

use App\Http\Resources\BlogPostResource;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Cache;

class BlogPostService
{
    public function getBlogPostResource(BlogPost $post, $with = ['votes', 'comments'], array $withCount = ['comments']): BlogPostResource
    {
        return new BlogPostResource($post->load($with)->loadCount($withCount));
    }

    public function vote(BlogPost $post, array $data): void
    {
        // Undo any previous votes by the same user
        $this->undoVote($post, auth()->id());

        // Record the new vote
        $post->votes()->create([
            'user_id' => auth()->id(),
            'type' => $data['type'],
        ]);
    }

    public function undoVote(BlogPost $post, int $userId): void
    {
        $queryVote = $post->votes()->where('user_id', $userId);
        if ($queryVote->exists()) {
            $queryVote->delete();
        }
    }

    public function addComment(BlogPost $post, array $inputs): void
    {
        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => $inputs['body'],
            'parent_id' => $inputs['parent_id'] ?? null,
        ]);
    }
}
