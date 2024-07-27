<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('admin_username')) {
            return redirect()->route('login-admin')->withErrors(['access_denied' => 'Anda harus masuk sebagai admin untuk mengakses halaman ini.']);
        }

        return $next($request);
    }
}
