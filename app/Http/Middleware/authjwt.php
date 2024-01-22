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
        // Mengambil nilai dari cookie 'token_auth' menggunakan helper function
        $token = isset($_COOKIE['token_auth']) ? $_COOKIE['token_auth'] : null;


        if ($token == null) {
            // dd($token);
            return redirect()->route('auth.login');
        }

        return $next($request);
    }
}
