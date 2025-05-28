<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
        $token = $request->header('Authorization');

        if (!$token || !Admin::where('api_token', $token)->exists()) {
            return response()->json(['message' => 'Non autorisé'], 401);
        }

        return $next($request);
    }
}
