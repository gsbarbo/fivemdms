<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DiscordLinkCheck
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

        if (is_null($request->user()->discord_id) || is_null($request->user()->discord_name)) {
            return redirect()->route('account.link.discord');
        }

        return $next($request);
    }
}
