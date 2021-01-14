<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                //if user is login on admin guard, and try go to login page, it redirects to admin
                if($guard == 'admin'){
                    return redirect()->route('admin');
                }
                //if user is login on web guard, and try go to login page, it redirects to home
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
