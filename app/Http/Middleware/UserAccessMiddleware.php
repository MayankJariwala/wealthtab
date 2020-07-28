<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
            if (!$request->headers->has("authorization")) {
            return response([
                "code" => 401,
                "message" => "Authorization token missing"
            ], 401);
        }
        return $next($request);
    }
}
