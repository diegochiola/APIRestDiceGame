<?php

namespace App\Http\Middleware;

use Closure;

class PlayerMiddleware
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
        // Si user tiene rol de administrador
        if ($request->user() && $request->user()->hasRole('player')) {
            return $next($request);
        }
        // Si user no es admin, error
        return response()->json(['error' => 'Access denied'], 403);
    }
}