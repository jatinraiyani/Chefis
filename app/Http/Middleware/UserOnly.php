<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserOnly
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
      if (Auth::user() && Auth::user()->hasRole('admin'))
        {
          Auth::logout();
          return redirect('login')->with('message','You can not Access this panel as Admin.');

        }
        return $next($request);
    }
}
