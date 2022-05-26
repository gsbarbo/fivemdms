<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class MustApply
{

    public function handle(Request $request, Closure $next)
    {

        if (!config('dms.must_apply')) {
            return redirect()->route('auth.account.show', $request->user()->steam_hex);
        }

        return $next($request);
    }
}
