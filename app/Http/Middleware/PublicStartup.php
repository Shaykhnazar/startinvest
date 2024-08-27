<?php

namespace App\Http\Middleware;

use App\Enums\StartupTypeEnum;
use Closure;
use Illuminate\Http\Request;

class PublicStartup
{
    /**
     * Checks whether the startup is public, if not it throws an access error.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $startup = $request->route()->parameter('startup');
        if ($startup->type !== StartupTypeEnum::PUBLIC->value) {
            abort(404);
        }

        return $next($request);
    }
}
