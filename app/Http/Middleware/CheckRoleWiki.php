<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
    public function handle(Request $request, Closure $next)
    {   
        $article = Article::find($request->route()->parameters()['id_article']);
        $check = FALSE;
        if (Auth::user()->id_role == 1 || Auth::user()->id == $article -> id_user) {
            $check = TRUE;
            return $next($request->merge(['check' => $check]));
        } else {
            $id_project = (int)$request->route()->parameters()['id_project'];
            return redirect()->action('ProjectController@show', ['id_project'=> $id_project]);
        }    
    }
}
