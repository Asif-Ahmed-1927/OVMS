<?php

namespace App\Http\Middleware;

use Closure;

class VolunteerVerify
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
        if ($request->session()->get('usertype') != "Volunteer") {
            //dd($request);
            $request->session()->flash('msg', 'Invalid req ... You do not have privilege to be a Volunteer!');
            return redirect()->route('dashboard');
            // 
        } else {
            return $next($request);
        }
    }
}
