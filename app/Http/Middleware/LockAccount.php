<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class LockAccount
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

        if ($request->session()->has('locked')) {
            if(Auth::user()->hasRole('admin')){

            return redirect('/admin/lock');
            } elseif(Auth::user()->hasRole('chef')){
                return redirect('chef-admin/lock');
            }

        }
        return $next($request);
    }
}
