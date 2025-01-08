<?php

namespace App\Models;

use App\Enums\VoteTypeEnum;
use App\Traits\Viewable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class BlogPost extends Model
{
    use HasFactory, AsSource, Filterable, Viewable;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image',
        'status',
        'published_at',
        'category_id',
        'author_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $allowedSorts = [
        'title',
        'created_at',
        'published_at',
        'status'
    ];

    protected $allowedFilters = [
        'title',
        'status',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable')
            ->orderBy('created_at', 'desc');
    }

    public function votes(): MorphMany
    {
        return $this->morphMany(Vote::class, 'voteable');
    }

    public function getUpvotesAttribute(): int
    {
        return $this->votes()->where('type', VoteTypeEnum::UP->name)->count();
    }

    public function getDownvotesAttribute(): int
    {
        return $this->votes()->where('type', VoteTypeEnum::DOWN->name)->count();
    }

    public function getFeaturedImageUrlAttribute()
    {
        if (!$this->featured_image) {
            return null;
        }

        return Storage::disk('public')->url($this->featured_image);
    }
}
