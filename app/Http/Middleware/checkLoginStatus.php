<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkLoginStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if(Auth::check()){
            $user = Auth::user();
            if(!in_array($user->role, $roles) && $request->is('/')){
                return redirect(route('admin.dashboard'));
            }elseif($request->is('login')){
                return redirect(route('admin.dashboard'));
            }
        }else{
            if(!$request->is('login')){
                // return redirect('/');
                return $next($request);
            }
        }
        return $next($request);
    }
}
