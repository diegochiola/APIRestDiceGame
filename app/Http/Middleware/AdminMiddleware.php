<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Si user tiene role admin:
        if ($request->user() && $request->user()->hasRole('admin')) {
            return $next($request);
        }
        // Si user no tiene rol admin, error
        return response()->json(['error' => 'Access denied'], 403);
    }
}
