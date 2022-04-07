<?php

namespace App\Http\Middleware;

use Closure;

class UserVerify
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
        if ($request->session()->get('usertype') != "User") {
            //dd($request);
            // $request->session()->flash('msg', 'Invalid req ... You do not have privilege to be a User!');
            return redirect()->route('dashboard');
            // 
        } else {
            return $next($request);
        }
    }
}
