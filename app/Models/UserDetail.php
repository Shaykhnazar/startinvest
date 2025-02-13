<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'avatar',
        'cover_photo',
        'resume',
        'bio',
        'skills',
        'experience',
        'education',
        'organization'
    ];

    protected $casts = [
        'skills' => 'array',
        'experience' => 'array',
        'education' => 'array'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
