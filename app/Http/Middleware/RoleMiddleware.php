<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{

    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Ensure user is logged in
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Get the logged-in user's role
        $userRole = auth()->user()->role; // make sure your User model has a 'role' field

        // Check if the role matches allowed roles
        if (!in_array($userRole, $roles)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
