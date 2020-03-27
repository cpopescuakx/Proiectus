<?php

namespace App\Http\Middleware;

use Closure;
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
        var_dump($request->path());

        /* if (Auth::check() == true && Auth::user()->id == Post::find($request->Post()->id_projecte)->id_user) {
            return $next($request);
        } else{
        return redirect()->route('');
        }; */
    }
}
