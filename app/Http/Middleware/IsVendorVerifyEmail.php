<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsVendorVerifyEmail
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
        if(Auth::guard('vendor')->user()->email_verified_at === null){
            Auth::guard('vendor')->logout();
            return redirect()->route('vendor.login')->with('fail','You need to confirm your account, we have sent you an activation link, please check your email.');
        }
        return $next($request);
    }
}
