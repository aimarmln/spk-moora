<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('user_username')) {
            return redirect()->route('login-user')->withErrors(['access_denied' => 'Anda harus masuk sebagai user untuk mengakses halaman ini.']);
        }

        return $next($request);
    }
}
