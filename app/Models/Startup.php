<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Startup extends Model
{
    use AsSource, Filterable, Attachable;

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
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'has_mvp' => 'boolean',
    ];

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
