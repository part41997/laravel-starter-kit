<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = 'en';

        if ($request->hasHeader('Accept-Language') && in_array($request->header('Accept-Language'), ['en', 'es'])) {
            $locale = $request->header('Accept-Language');
        } else if (Session::has('locale')) {
            $locale = Session::get('locale');
        }
        App::setLocale($locale);
        return $next($request);
    }
}
