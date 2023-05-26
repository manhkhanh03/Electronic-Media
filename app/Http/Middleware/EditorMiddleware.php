<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EditorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && $user->role && $user->role->name === 'editor' || $user->role->name === 'admin') {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    
    }
}
