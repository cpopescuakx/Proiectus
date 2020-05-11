<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Blog;
use App\Post;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
            if (Auth::check() == true && Auth::user()->id_role == 5 || Auth::user()->id_role == 1) {
            return $next($request);
            } else {
            return redirect()->route('login');
            };
        }
    }

    /** PROVA PER A EN UN MATEIX FITXER REALITZAR DIVERSOS CHECK ROLE AMB UN SWITCH */
    /* public function handle($request, Closure $next, $tipo)
    {
        switch($tipo){
            case gestor:
                if (Auth::check() == true && Auth::user()->id_role == 5) {
                    return $next($request);
                } else {
                return redirect()->route('login');
                };
            case blog:
                if (Auth::check() == true && Auth::user()->id == Post::find($id_projecte)->id_user) {
                    return $next($request);
                } else{
                return redirect()->route('');
                };
            case article:
                if (Auth::check() == true && Auth::user()->id_role == 5) {
                    return $next($request);
                }
        }
    } */
