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
        $user =Auth::guard('admin')->user();
        if(empty($user)){
            return redirect(route('admin.public.index'))->withErrors(['error'=>'请登录']);
        }
        //dd(empty(Auth::guard('admin')->user()));
        return $next($request);
    }
}
