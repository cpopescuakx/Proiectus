<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendingEntityRegistration
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
        if (Auth::check() == true && Auth::user()->id_role == null) {
            if (!($request->is('entityRegistration')) && Auth::user()->pending_entity_registration == true) {
                return redirect('entityRegistration');
            }
        } else {
            if ($request->is('entityRegistration')) {
                return redirect('login');
            }
        }
        

        return $next($request);
    }
}
