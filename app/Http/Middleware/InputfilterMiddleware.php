<?php

namespace App\Http\Middleware;

use Closure;

class InputfilterMiddleware
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
        if(isset($request['_token'])) unset($request['_token']);
        return $next($request);
    }
}
