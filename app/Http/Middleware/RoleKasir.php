<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleKasir
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
        $currentUser = Auth::user();
        $roleUser = $currentUser->role;

        if($roleUser !== 'Kasir'):
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized'
            ], 401);
        endif;

        return $next($request);
    }
}
