<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class StartupStatus extends Model
{
    use HasTranslations;

    public $translatable = ['label'];

    public function startups(): HasMany
    {
        return $this->hasMany(Startup::class, 'status_id');
    }

}
