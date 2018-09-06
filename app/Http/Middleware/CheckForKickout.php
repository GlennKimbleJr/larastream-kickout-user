<?php

namespace App\Http\Middleware;

use Closure;

class CheckForKickout
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
        if ($request->user() && cache()->pull('kickout-user-'.$request->user()->id)) {
            auth()->logout();

            return redirect()->to('login');
        }

        return $next($request);
    }
}
