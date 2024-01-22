<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class authjwt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle($request, Closure $next)
    // {
    //     if (empty($_COOKIE['token_auth'])) {
    //         return redirect()->route('auth.login');
    //     }

    //     return $next($request);
    // }
    public function handle($request, Closure $next)
    {
        $token = isset($_COOKIE['token_auth']) ? $_COOKIE['token_auth'] : null;

        if (empty($token)) {
            return redirect()->route('auth.login');
        }

        $redirectCount = $request->session()->get('redirect_count', 0);

        if ($redirectCount >= 3) {
            return response('Too many redirects', 500);
        }

        $request->session()->put('redirect_count', $redirectCount + 1);

        return $next($request);
    }
}
