<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAccess
{
    public function handle($request, Closure $next)
    {
        // Check if the authenticated user has the necessary permissions
        if (auth()->check() && auth()->user()->hasPermission($request->path())) {
            return $next($request);
        }

        // Redirect or handle unauthorized access
        abort(403, 'Unauthorized access.');
    }
}