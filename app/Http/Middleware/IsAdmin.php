<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

// TODO Redirect to you not allowed if not admin

    public function handle($request, Closure $next)
    {
        if (!\Auth::user()->isAn('admin')) {
//            \App::abort(404);
        }
        return $next($request);
    }
}
