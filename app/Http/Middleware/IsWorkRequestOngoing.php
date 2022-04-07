<?php

namespace App\Http\Middleware;

use Closure;
use App\WorkRequest;

class IsWorkRequestOngoing
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

        $workRequest = WorkRequest::where('status', "accepted");
        $user = $request->session()->get('usertype');




        if ($user == 'User') {
            $workRequest = $workRequest->where('user_id', $request->session()->get('userid'));
        } else if ($user == 'Volunteer') {
            $workRequest = $workRequest->where('volunteer_id', $request->session()->get('userid'));
        } else if ($user == 'Admin') {
            return $next($request);
        }

        $workRequest = $workRequest->first();

        if ($workRequest) {
            if ($request->session()->get('usertype') == 'User') {
                return $next($request);
            } else {

                return redirect()->route('work.ongoing', ['id' => $workRequest->id]);
            }
        } else {
            return $next($request);
        }
    }
}
