<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\GeneralTrait;
use Tymon\JWTAuth\Facades\JWTAuth;
class CheckAdminToken
{
    use GeneralTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user=null;
        try{
           $user=JWTAuth::parseToken()->authenicate();
        }
        catch(\Exception $e)
        {
            return $this->returnErrorMessage(404,"error");
        }
        if(!$user)
        {
            return $this->returnErrorMessage(404,"user Not Found");
            
        }
        return $next($request);
    }
}
