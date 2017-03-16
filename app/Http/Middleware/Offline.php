<?php

namespace App\Http\Middleware;

use Closure;

class Offline
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
        $settingsOfflineMode = setting('statue');
        $userIp = \Request::server('REMOTE_ADDR');
        $arr = explode( PHP_EOL , setting('ips'));     // PHP_EON  Mean  End Of Line
//        dd($arr);
        // Maintenance Mode
        if($settingsOfflineMode  == 'offline' && !in_array($userIp, $arr)) {
            return \App::abort(503, 'Website Offline');
        }

        return $next($request);

    }
}
