<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locales = ['ru', 'kk', 'en'];
        $locale = $request->header('Accept-Language');

        if ($locale && in_array($locale, $locales)) {
            App::setLocale($request->header('Accept-Language'));
        }

        return $next($request);
    }
}
