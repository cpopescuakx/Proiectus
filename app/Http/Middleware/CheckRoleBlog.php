<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use App\Blog;
use App\Post;

class CheckRoleBlog
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
        if (Auth::check() == true && Auth::user()->id == Post::find($request->route()->parameters()['id_post'])->id_user) {
            return redirect()->route('login');
        } 
    }
}
