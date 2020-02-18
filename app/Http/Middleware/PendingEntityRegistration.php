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

            if ($request->is('pendingVerification') || $request->is('entityRegistration')) {
                if (Auth::user()->pending_entity_registration == false &&
                Auth::user()->pending_entity_verification == false) {
                    return redirect('/');
                }
            }

            if ($request->is('pendingVerification')) {
                if (Auth::user()->pending_entity_registration = true &&
                Auth::user()->pending_entity_verification == false) {
                    return redirect('entityRegistration');
                }
            }

            if ($request->is('entityRegistration')) {
                if (Auth::user()->pending_entity_registration = true &&
                Auth::user()->pending_entity_verification == true) {
                    return redirect('pendingVerification');
                }
            }

            if (!($request->is('entityRegistration')) &&
            Auth::user()->pending_entity_registration == true) {
                return redirect('entityRegistration');
            }
        } else {
            if ($request->is('entityRegistration') || $request->is('pendingVerification')) {
                return redirect('login');
            }
        }
        

        return $next($request);
    }
}
