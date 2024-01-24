<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecretMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try{
            if(auth()->user()){
                if(auth()->user()->id == $request->route()->parameter('id')){
                    return $next($request);
                }
            }
            if($request->has("secret")){
                // if(decrypt($request->secret) == $request->route()->parameter('id')){
                if(JWT::decode($request->secret, new Key(env("APP_KEY"), 'HS256'))->id == $request->route()->parameter('id')){
                    return $next($request);
                }
            }
    
            return response()->json([
                "message" => "Access denied 403 error!"
            ], 403);
        }catch (Exception $e){
            return response()->json([
                "message" => "Access denied 403 error!"
            ], 403);
        }
    }
}
