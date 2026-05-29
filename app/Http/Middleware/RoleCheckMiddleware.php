<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleCheckMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = $request->user();

        // User not authenticated
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthenticated'
            ], 401);
        }

        // Role mapping
        $roles = [
            'admin' => 1,
            'teacher' => 2,
            'student' => 3,
        ];

        // Check role
        if (!isset($roles[$role]) || $user->role_id != $roles[$role]) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        return $next($request);
    }
}