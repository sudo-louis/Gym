<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthenticated
{
    public function handle($request, Closure $next)
    {
        if (!auth()->guard('admins')->check()) {
            return redirect('/admins/login');
        }

        return $next($request);
    }
}
