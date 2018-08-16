<?php

namespace App\Http\Middleware;

use Closure;

class login
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
        if(!$request->session()->has('user')){
            return redirect(route('admin.public.index'))->withErrors(['error'=>'请登录']);
        }
        //dd(empty(Auth::guard('admin')->user()));
        return $next($request);
    }
}
