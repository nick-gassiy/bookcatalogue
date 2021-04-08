<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CheckIfAdmin
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
        $user = $request->user();

        if (!auth()->check()) {
            return App::abort(auth()->check() ? 403 : 401,auth()->check() ? 'Forbidden' : 'Unauthorized');
        }

        return $next($request);
    }

}
