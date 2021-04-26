<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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

        //check for banned and return message
        if(Auth::check() && Auth::user()->isban)
        {
            $banned = Auth::user()->isban == '1';
            Auth::logout();

            if($banned == 1){
                $message = 'Your Account has been banned. Please contact Administrator';
            }
            return redirect()->route('login')
                  ->with('status',$message)
                  ->withErrors(['email' => 'Your Account has been banned. Please contact Administrator']);
        }

        if(Auth::check())
        {
            $expiresAt = Carbon::now()->addMinutes(1);
            Cache::put('user-is-online' . Auth::user()->id, true, $expiresAt);
        }

        return $next($request);
    }
}
