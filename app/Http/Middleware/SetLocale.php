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
        $locale = session()->get('locale', 'id');
        App::setLocale($locale);

        $response = $next($request);

        if ($locale === 'en') {
            $response->headers->setCookie(cookie('googtrans', '/id/en', 0, '/', null, false, false));
        } else {
            $response->headers->setCookie(cookie()->forget('googtrans'));
        }

        return $response;
    }
}
