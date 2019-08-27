<?php

namespace App\Http\Middleware;

use Closure;

class PublicMiddleware
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
        $siteName = "Legal Justice Aid";
        return $next($request);
    }
}
