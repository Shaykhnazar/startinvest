<?php

namespace App\Models;

use App\Enums\StartupTypeEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Startup extends Model
{
    use AsSource, Filterable, Attachable, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'additional_information',
        'start_date',
        'end_date',
        'success_rate',
        'owner_id',
        'client_id',
        'base_price',
        'has_mvp',
        'status',
        'type',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'has_mvp' => 'boolean',
        'description' => 'array'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function industries(): BelongsToMany
    {
        return $this->belongsToMany(Industry::class, 'startup_industry');
    }

    public function contributors(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'startup_contributor', 'startup_id', 'contributor_id');
    }

    public function joinRequests(): HasMany
    {
        return $this->hasMany(StartupJoinRequest::class, 'startup_id');
    }

    public function scopePublic(Builder $builder): Builder
    {
        return $builder->where('type', StartupTypeEnum::PUBLIC);
    }

    public function scopePrivate(Builder $builder): Builder
    {
        return $builder->where('type', StartupTypeEnum::PRIVATE);
    }
}
