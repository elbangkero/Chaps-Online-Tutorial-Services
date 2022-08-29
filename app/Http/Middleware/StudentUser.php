<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class StudentUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // If user account type is profile allow to next or else block the request
        if (Auth::user() &&  Auth::user()->user_type == '1') {
            return $next($request);
        } else if (Auth::user() &&  Auth::user()->user_type == '2' && Auth::user()->is_active ==1) {
            return $next($request);
        } else { 
            abort(403, 'Unauthorized action.');
        }
    }
}
