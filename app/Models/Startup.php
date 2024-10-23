<?php

namespace App\Models;

use App\Enums\StartupTypeEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'status_id',
        'type',
        'verified',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'has_mvp' => 'boolean',
        'description' => 'array',
        'verified' => 'boolean',
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

    public function status()
    {
        return $this->belongsTo(StartupStatus::class, 'status_id');
    }

    /**
     * Get the publication status of the startup.
     */
    public function publication(): HasOne
    {
        return $this->hasOne(StartupPublication::class);
    }

    public function scopePublic(Builder $builder): Builder
    {
        return $builder->where('type', StartupTypeEnum::PUBLIC);
    }

    public function scopePrivate(Builder $builder): Builder
    {
        return $builder->where('type', StartupTypeEnum::PRIVATE);
    }

    public function scopeApplySearch(Builder $builder, $search): Builder
    {
        return $builder->when($search, function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        });
    }

    public function scopeFilterByIndustry(Builder $builder, $industryId): Builder
    {
        return $builder->when($industryId, function ($query) use ($industryId) {
            $query->whereHas('industries', function ($query) use ($industryId) {
                $query->where('industries.id', $industryId);
            });
        });
    }

    public function scopeFilterByStatus(Builder $builder, $statusId): Builder
    {
        return $builder->when($statusId, function ($query) use ($statusId) {
            $query->where('status_id', $statusId);
        });
    }

    public function scopeSortBy(Builder $builder, $sort): Builder
    {
        return $builder->when($sort, function ($query) use ($sort) {
            switch ($sort) {
                case 'created_at-asc':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'title-asc':
                    $query->orderBy('title', 'asc');
                    break;
                case 'title-desc':
                    $query->orderBy('title', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        }, function ($query) {
            $query->orderBy('created_at', 'desc');
        });
    }
}
