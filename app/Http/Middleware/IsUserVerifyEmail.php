<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class IsUserVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('customer')->user()->email_verified_at === null){
            Auth::guard('customer')->logout();
            return redirect()->route('customer.login')->with('fail','You need to confirm your account, we have sent you an activation link, please check your email.');
        }
        return $next($request);
    }
}
