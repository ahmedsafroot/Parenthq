<?php

namespace App\Http\Middleware;

use Closure;

class CheckedPassword
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
        if($request->api_password!=env('Api_password'))
        {
             return response()->json(['message'=>'you are not authenticated']);
        }
        
        return $next($request);
    }
}
