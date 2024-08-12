<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Industry extends Model
{
    use AsSource, Filterable, Attachable;

    public function startups(): BelongsToMany
    {
        return $this->belongsToMany(Startup::class, 'startup_industry');
    }
}
