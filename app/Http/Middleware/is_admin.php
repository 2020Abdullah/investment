<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class is_admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){

            if(Auth::user()->is_admin == 1){

                return $next($request);

            }
            else {

                return redirect('/home')->with('status', 'انت مستخدم عادى');

            }

        }
        else {

            return redirect('/login')->with('error', 'من فضلك قم بتسجيل الدخول أولاً');

        }
        return $next($request);
    }
}
