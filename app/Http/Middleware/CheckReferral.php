<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class CheckReferral
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if( $request->hasCookie('referral')) {
            return $next($request);
        }
        else {
            if( Session::has('ref') ) {
                return redirect($request->fullUrl())->withCookie(cookie()->forever('referral',Session::get('ref')));
            }
        }

        return $next($request);
    }
}
