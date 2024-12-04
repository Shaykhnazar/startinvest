<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'profile_username',
        'status',
        'last_known_followers',
        'last_known_following',
        'last_known_posts',
    ];
}
