<?php

namespace App\Http\Middleware\Roles;

use App\Enums\UserType;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class HeadOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (\Auth::user()->type->value === UserType::Head) {
            return $next($request);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
