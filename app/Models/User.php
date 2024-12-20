<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDateStartEnd;
use Orchid\Platform\Models\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'permissions',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'permissions',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'permissions'          => 'array',
        'email_verified_at'    => 'datetime',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
       'id'         => Where::class,
       'name'       => Like::class,
       'email'      => Like::class,
       'updated_at' => WhereDateStartEnd::class,
       'created_at' => WhereDateStartEnd::class,
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'name',
        'email',
        'updated_at',
        'created_at',
    ];

    /**
     * Get all the socials for the User
     *
     * @return HasMany
     */
    public function socials(): HasMany
    {
        return $this->hasMany(Social::class);
    }

    public function investor(): HasOne
    {
        return $this->hasOne(Investor::class, 'user_id');
    }

    public function details(): HasOne
    {
        return $this->hasOne(UserDetail::class, 'user_id');
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class, 'user_id');
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class, 'user_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function sentMessages()
    {
        return $this->hasMany(ChatMessage::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(ChatMessage::class, 'receiver_id');
    }

    public function joinRequests(): HasMany
    {
        return $this->hasMany(StartupJoinRequest::class, 'user_id');
    }

    public function contributedStartups(): BelongsToMany
    {
        return $this->belongsToMany(Startup::class, 'startup_contributor', 'contributor_id', 'startup_id');
    }

    public function socialProfiles(): HasMany
    {
        return $this->hasMany(UserSocialProfile::class, 'user_id');
    }

//    public function roles()
//    {
//        return $this->belongsToMany(Role::class, 'role_users');
//    }

    public function getAuthPasswordName()
    {
        return 'password';
    }

    public function scopeHasRole($query, $role)
    {
        if (!$role) {
            return $query;
        }

        return $query->whereHas('roles', function ($query) use ($role) {
            $query->where('roles.slug', $role)->orWhere('roles.id', $role);
        });
    }

    public function checkRole($roles)
    {
        if (!$roles) {
            return null;
        }

        return $this->roles->whereIn('slug', $roles)->first();
    }

}
