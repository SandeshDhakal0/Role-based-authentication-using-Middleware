<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class AdminMiddleware
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
        //Role == 1 Admin
        //Role == 0 User
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                return $next($request);
        } else {
            redirect('/products')->with('message','Access denied as you are not an Admin');
        } 
        return $next($request);
    } else {
        redirect('/login')->with('message','Login to access the website.'); 
    }
        return $next($request);
}
}
