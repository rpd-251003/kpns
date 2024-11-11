<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role  Role yang diharapkan untuk akses
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        try {
            // Ambil token dari cookie
            $token = $request->cookie('token');
            $user = JWTAuth::setToken($token)->parseToken()->authenticate();

            // Periksa apakah user memiliki role yang sesuai
            if ($user->role !== $role) {
                return response()->json(['message' => 'Forbidden'], 403);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
