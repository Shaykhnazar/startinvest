<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Spatie\Translatable\HasTranslations;

class BlogCategory extends Model
{
    use SoftDeletes, AsSource, Filterable, HasTranslations;

    public $translatable = ['name', 'description'];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $allowedSorts = [
        'order',
        'created_at'
    ];

    protected $allowedFilters = [
        'name',
        'is_active'
    ];

    /**
     * Get the parent category
     */
    public function parent()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id');
    }

    /**
     * Get the child categories
     */
    public function children()
    {
        return $this->hasMany(BlogCategory::class, 'parent_id');
    }

    /**
     * Get the posts in this category
     */
    public function posts()
    {
        return $this->hasMany(BlogPost::class, 'category_id');
    }
}
