<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RolePelayan
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

        if($roleUser !== 'Pelayan'):
            return response()->json([
                'success' => false,
                'error' => 'Unauthorized'
            ], 401);
        endif;

        return $next($request);
    }
}
