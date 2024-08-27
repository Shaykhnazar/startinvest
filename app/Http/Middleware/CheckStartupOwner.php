<?php

namespace App\Http\Middleware;

use Closure;

class CheckStartupOwner
{
    public function handle($request, Closure $next)
    {
        $startup = $request->route()->parameter('startup');

        // Check if the authenticated user is the owner of the startup
        if ($startup && $startup->owner_id !== $request->user()->id) {
            abort(403, 'You do not have access to this startup.');
        }

        return $next($request);
    }
}

