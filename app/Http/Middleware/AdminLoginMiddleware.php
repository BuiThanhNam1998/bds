<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     if(Auth::check()){
    //         if(Auth::user()->role_id==2){ 
    //             return $next($request);
    //         }
    //         else {
    //             return redirect('admin/login');
    //         }
    //     }
    //     else {
    //         return redirect('admin/login');
    //     }

    // }
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('admins')->check()) {
            return redirect('admin/login');
        }

        return $next($request);
    }
}
