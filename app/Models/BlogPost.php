<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class BlogPost extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image',
        'status',
        'published_at',
        'category_id'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'featured_image' => 'json'
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
}
