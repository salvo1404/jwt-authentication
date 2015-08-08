<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Response;

class UserActivated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($user = JWTAuth::parseToken()->authenticate()) {
            if (!$user->is_active) {
                // Unauthorised
                return Response::json(
                    [
                        'error' => [
                            'message'     => 'User Non Activated',
                            'status_code' => 403,
                        ]
                    ],
                    403
                );
            }
        }

        return $next($request);
    }

}
