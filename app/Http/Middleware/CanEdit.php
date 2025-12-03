<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Symfony\Component\HttpFoundation\Response;

class CanEdit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $method = $request->method();
        $user_role = auth()->user()->role->first();
        $allowed_roles = ['admin', 'moderator'];
        if($method != 'GET' && !in_array($user_role, $allowed_roles)){
            return response([
                'message' => 'forbidden'
            ],HttpResponse::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
