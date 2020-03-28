<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Project;
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
        $check = FALSE;
        if (Auth::check() == true && Auth::user()->id == Post::find($request->route()->parameters()['id_post'])->id_user) {
            $check = TRUE;
            return $next($request);
        } else {
            $id_project = (int)$request->route()->parameters()['id_project'];
            return redirect()->action('ProjectController@show, ['.$id_project.']');
        }
        /*  $check = FALSE;
        if (Auth::check() == true && Auth::user()->id == Post::find($request->route()->parameters()['id_post'])->id_user) {
            $check = TRUE;
            return $next($request);
        } else {
            $id_project = (int)$request->route()->parameters()['id_project'];
            return redirect()->action('ProjectController@show, ['.$id_project.']');
        } */
    }
}
