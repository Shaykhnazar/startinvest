<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    /**
     * Available locales in the application.
     */
    protected array $availableLocales = ['ru', 'en', 'uz_Latn', 'uz_Cryl'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if a locale is provided in the URL
        $locale = session('locale'); // Assumes the locale is the first segment of the URL

        // Validate the locale against the available locales
        if (in_array($locale, $this->availableLocales)) {
            app()->setLocale($locale);
        }

        // Proceed with the request
        return $next($request);
    }
}
