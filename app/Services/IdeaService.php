<?php

namespace App\Services;

use App\Http\Resources\IdeaResource;
use App\Models\Idea;
use Illuminate\Support\Facades\Cache;

class IdeaService
{
    public function getIdeaResource(Idea $idea, $with = ['author', 'votes', 'comments'], array $withCount = ['comments']): IdeaResource
    {
        return new IdeaResource($idea->load($with)->loadCount($withCount));
    }

    public function vote(Idea $idea, $data): void
    {
        // Undo any previous votes by the same user
        $this->undoVote($idea, auth()->id());

        // Record the new vote
        $idea->votes()->create([
            'user_id' => auth()->id(),
            'type' => $data['type'],
        ]);
        // Clear the cache for upvotes and downvotes
        $this->clearVotesCache($idea->id);
    }

    public function undoVote(Idea $idea, int $userId): void
    {
        $queryVote = $idea->votes()->where('user_id', $userId);
        if ($queryVote->exists()) {
            $queryVote->delete();
            // Clear the cache for upvotes and downvotes
            $this->clearVotesCache($idea->id);
        }
    }

    public function toggleFavorite(Idea $idea): void
    {
        $queryFavorites = $idea->favorites()->where('user_id', auth()->id());
        if ($queryFavorites->exists()) {
            // Remove the favorite record
            $queryFavorites->delete();
        } else {
            // Add a new favorite record
            $idea->favorites()->create([
                'user_id' => auth()->id(),
            ]);
        }
    }

    public function addComment(Idea $idea, $inputs): void
    {
        $idea->comments()->create([
            'user_id' => auth()->id(),
            'body' => $inputs['body'],
            'parent_id' => $inputs['parent_id'] ?? null,
        ]);
    }

    protected function clearVotesCache(int $ideaId): void
    {
        Cache::forget('idea_' . $ideaId . '_upvotes');
        Cache::forget('idea_' . $ideaId . '_downvotes');
    }
}
