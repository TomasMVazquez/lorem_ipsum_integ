<?php

namespace App\Http\Middleware;

use Closure;
// use App\User;

// // use App\Http\Controllers\Controller;
// // use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class isAdmin
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
        // if (Auth::user() &&  Auth::user()->admin == 1) {
        if (true) {
            return $next($request);
        }
        // abort(403);
        return redirect('/');
        // return route('login');
    }


}
