<?php

namespace App\Models;

use App\Enums\VoteTypeEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Idea extends Model
{
    use AsSource, Filterable, Attachable;

    protected $fillable = [
        'title',
        'description',
        'author_id',
    ];

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable')
            ->orderBy('created_at', 'desc');
    }

    public function votes(): MorphMany
    {
        return $this->morphMany(Vote::class, 'voteable');
    }

    public function favorites(): MorphMany
    {
        return $this->morphMany(Favorite::class, 'favoriteable');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Idea::class, 'parent_id');
    }

    protected function getUpvotesAttribute(): int
    {
        return $this->votes()->where('type', 'up')->count();
    }

    protected function getDownvotesAttribute(): int
    {
        return $this->votes()->where('type', 'down')->count();
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function hasUserVoted(int $userId, VoteTypeEnum $type): bool
    {
        return $this->votes()
            ->where('user_id', $userId)
            ->where('type', $type->name)
            ->exists();
    }

    public function undoVote(int $userId): void
    {
        $this->votes()->where('user_id', $userId)->delete();
    }

    public function vote(int $userId, VoteTypeEnum $type): void
    {
        // Undo any previous votes by the same user
        $this->undoVote($userId);

        // Record the new vote
        $this->votes()->create([
            'user_id' => $userId,
            'type' => $type->name,
        ]);
    }

    public function toggleFavorite($userId): void
    {
        if ($this->hasUserFavorited($userId)) {
            // Remove the favorite record
            $this->favorites()
                ->where('user_id', $userId)
                ->delete();
        } else {
            // Add a new favorite record
            $this->favorites()->create([
                'user_id' => $userId,
            ]);
        }
    }

    public function hasUserFavorited($userId): bool
    {
        return $this->favorites()
            ->where('user_id', $userId)
            ->exists();
    }

    public function addComment($inputs): void
    {
        $this->comments()->create([
            'user_id' => $inputs['user_id'],
            'body' => $inputs['body'],
            'parent_id' => $inputs['parent_id'] ?? null,
        ]);
    }
}
