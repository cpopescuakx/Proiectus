<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class administracioEstudiants
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
        if (Auth::check() == true && Auth::user()->id_role == 4 || Auth::user()->id_role == 5 || Auth::user()->id_role == 1) {
                return $next($request);
            } else {
                return redirect()->route('login');
            }
    }
}
