<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ChefAuth
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
        if (Auth::user() &&  Auth::user()->hasRole('chef')) {
            return $next($request);
        }
        Auth::logout();
        return redirect('chef-admin/login');
    }
}
