<?php

namespace App\Models;

use App\Enums\JoinRequestStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StartupJoinRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'startup_id',
        'user_id',
        'status',
        'decision_at'
    ];

    protected $casts = [
        'status' => JoinRequestStatusEnum::class,
        'decision_at' => 'datetime',
    ];

    public function startup(): BelongsTo
    {
        return $this->belongsTo(Startup::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
