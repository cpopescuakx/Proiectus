<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\Wiki;
use App\Article;

class CheckRoleWiki
{
    /**
     * 
     * Aquest middleware, l'utilitzarem per a realitzar la comprovació del rol d'un usuari 
     * a l'hora de realitzar qualsevol acció amb un article existent
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $check = FALSE;
        if (Auth::check() == true && Auth::user()->id == Article::find($request->route()->parameters()['id_article'])->id_user) {
            $check = TRUE;
            return $next($request);
        } else {
            $id_project = (int)$request->route()->parameters()['id_project'];
            return redirect()->action('ProjectController@show', ['id_project'=> $id_project]);
        }    }
}
