<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // copas di documentasi middleware parameters
        if (auth()->user()->role != $role) { // jk user rolenya tdk sama dengan 1 maka dia tdk bsa akses categories
            abort(403); // forbidden
        }

        return $next($request);
    }
}
