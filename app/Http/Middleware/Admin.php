<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (@Auth::user()->hasRole('Admin')) {
                return $next($request);
            } else {
                abort('404');
            }
            // return $next($request);

        } else {
            return redirect('/');
            // return $next($request);
        }
    }
}
