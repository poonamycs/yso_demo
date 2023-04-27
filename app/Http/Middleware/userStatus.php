<?php

namespace App\Http\Middleware;

use Closure;
use App\Admin;
use Carbon\Carbon;
use Auth;
use Cache;

class userStatus
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
        if(Auth::check()){
            $expiresAt = Carbon::now()->addMinutes(1);
            Cache::put('user-is-online-' . Auth::guard('admin')->User()->id, true, $expiresAt);
        }
        return $next($request);
    }
}
