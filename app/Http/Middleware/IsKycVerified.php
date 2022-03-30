<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsKycVerified
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
        if (Auth::check() && (Auth::user()->user_type == 'member') && Auth::user()->kyc_verified == 1) {
            return $next($request);
        }
        return redirect()->route('kyc_verification');
    }
}