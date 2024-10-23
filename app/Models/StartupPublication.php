<?php

namespace App\Models;

use App\Enums\SocialMediaEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StartupPublication extends Model
{
    use HasFactory;

    protected $fillable = [
        'startup_id',
        'instagram',
        'linkedin',
        'reddit',
        'telegram',
        'published_at'
    ];

    /**
     * Get the startup associated with this publication.
     */
    public function startup(): BelongsTo
    {
        return $this->belongsTo(Startup::class);
    }

    /**
     * Set publication status for a specific platform.
     *
     * @param SocialMediaEnum $platform
     * @return void
     */
    public function setPublicationStatus(SocialMediaEnum $platform): void
    {
        $platformValue = $platform->value;

        if (in_array($platformValue, SocialMediaEnum::all())) {
            $this->$platformValue = true;
            $this->published_at = now();
            $this->save();
        }
    }
}
