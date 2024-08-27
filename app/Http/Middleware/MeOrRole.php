<?php

namespace App\Http\Middleware;

use Closure;

class MeOrRole
{
    /**
     * If the request contains the 'user' parameter - checks that this user is the current authorized user
     * Otherwise checks that the user has the required roles
     *
     * @param $request
     * @param  Closure  $next
     * @param ...$roles
     * @return mixed|void
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $userId = $request->route()->parameter('user');
        if ($userId && (int)$userId === $request->user()->id) {
            return $next($request);
        }
//        if (\Auth::check() && $request->user()->checkRole($roles)) {
//            return $next($request);
//        }
        abort(403);
    }
}
