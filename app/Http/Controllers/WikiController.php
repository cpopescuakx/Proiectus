<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wiki;
use App\Article;
use Illuminate\Support\Facades\Log;

class WikiController extends Controller
{
    /**
     * Retorna la vista de la wiki passant-li els articles i la wiki.
     * 
     * @param int $id_project
     * @var wiki variable per emmagatzemar la wiki que sigui del projecte que hem passat.
     * @var articles variable per emmagatzemar tots els articles que siguin del projecte que hem passat.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
     public function index($id_project)
     {
         $articles = Article::all()
         ->sortByDesc('created_at')
         ->where('id_project', '=', $id_project)
         ->where('status', '=', 'active');

         $wiki = Wiki::find($id_project);

         return view('Wiki.index', compact('articles','id_project', 'wiki'));
     }

    /**
     * Retorna la vista d'edició passant-li la wiki.
     *
     * @param  int  $id_project
     * @var wiki variable per emmagatzemar la wiki que sigui del projecte que hem passat. 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
     public function edit($id_project)
     {
       $wiki = Wiki::find($id_project);
       return view('Wiki.edit', compact('wiki', 'id_project'));
     }

    /**
     * Actualitza el títol de la wiki i retorna la vista d'aquesta.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_project
     * @var wiki variable que busca la wiki per el paràmetre id_project, canvia el títol d'aquesta i ho guarda
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
     public function update(Request $request, $id_project)
     {
         $this-> validate($request, [
             'title'    =>  'required'
         ]);
         $wiki = Wiki::find($id_project);
         $wiki->title = $request->get('title');
         $wiki->id_project = $id_project;

         $wiki->save();

         return redirect()->route('projects.show', compact('id_project','id_article'));
     }
}
