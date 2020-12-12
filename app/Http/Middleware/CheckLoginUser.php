<?php

namespace App\Http\Middleware;

use Closure;
use App\Utils\Auth;

class CheckLoginUser
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
        if(!Auth::token()){
            return redirect()->route("login");
        }

        return $next($request);
    }
}
