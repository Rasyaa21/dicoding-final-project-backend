<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicationJsonMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->isJson()){
            return response()->json([
                'error' => 'accept header must be application/json'
            ], Response::HTTP_UNSUPPORTED_MEDIA_TYPE );
        }
        return $next($request);
    }
}
