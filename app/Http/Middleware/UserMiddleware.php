<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class UserMiddleware
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
        if(Auth::user()->usertype == 'usuari' || Auth::user()->usertype == 'admin')
        {
            return $next($request);
        } else {
            return redirect('/home')->with('status','No tienes acceso');
        }
    }
}
