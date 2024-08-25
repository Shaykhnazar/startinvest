<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Models\User;

class UserService
{
    /**
     * @param array $with
     * @return User|null
     */
    public static function getAuthUser(array $with = []): ?User
    {
        return auth()->user()->load($with)->loadCount($with);
    }

    public static function getAuthUserResource(array $with = ['votes', 'comments', 'favorites', 'joinRequests', 'contributedStartups']): UserResource
    {
        return new UserResource(self::getAuthUser($with));
    }
}
