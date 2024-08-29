<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StartupStatus extends Model
{

    public function startups(): HasMany
    {
        return $this->hasMany(Startup::class, 'status_id');
    }

}
