<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard as Auth;
use Illuminate\Contracts\Cache\Repository as Cache;

class CheckForKickout
{
    protected $auth;

    protected $cache;

    public function __construct(Auth $auth, Cache $cache)
    {
        $this->auth = $auth;

        $this->cache = $cache;
    }

    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($user && $this->cache->pull("kickout-user-{$user->id}")) {
            $this->auth->logout();

            return redirect()->to(route('login'));
        }

        return $next($request);
    }
}
