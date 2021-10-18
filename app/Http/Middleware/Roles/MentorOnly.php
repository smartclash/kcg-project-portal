<?php

namespace App\Http\Middleware\Roles;

use App\Enums\UserType;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class MentorOnly
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
        if (\Auth::user()->type->is(UserType::Mentor())) {
            return $next($request);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
