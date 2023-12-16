<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
}
