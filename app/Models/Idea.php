<?php

namespace App\Models;

use App\Enums\VoteTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Cache;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Spatie\Translatable\HasTranslations;

class Idea extends Model
{
    use AsSource, Filterable, Attachable, HasTranslations;

    public $translatable = ['title', 'description'];

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
        return Cache::remember('idea_' . $this->id . '_upvotes', now()->addDays(7), function () {
            return $this->votes()->where('type', VoteTypeEnum::UP->name)->count();
        });
    }

    protected function getDownvotesAttribute(): int
    {
        return Cache::remember('idea_' . $this->id . '_downvotes', now()->addDays(7), function () {
            return $this->votes()->where('type', VoteTypeEnum::DOWN->name)->count();
        });
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
