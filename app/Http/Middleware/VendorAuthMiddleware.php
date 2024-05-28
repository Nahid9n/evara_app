<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;
class VendorAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::get('vendor_id'))
        {
            return $next($request);
        }
        else
        {
            //  return redirect()->back()->with('message', 'Un authorize excess.');
            return redirect('/vendor-login-register')->with('message', 'Un authorize excess.');
        }
    }
}
