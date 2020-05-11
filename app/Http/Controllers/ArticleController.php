<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    /**
     * LListat de tots els articles que formin part del projecte i estiguin en status (active).
     * 
     * @param  int $id_project Conté la id del projecte del qual cercarem els articles.
     * @return \Illuminate\Http\Response
     */
    public function index($id_project){
        $articles = Article::all()->where('id_project', '=', $id_project)->where('status', '=', 'active');
        return view('articles.index', compact('articles', 'id_project'));
    }

    /**
     * Guardem els articles creats.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id_project Conté la id del projecte que assignarem als articles guardats. 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_project){

        //Establim que els camps següents siguin required i comprovem aquests.
        $request->validate([
            // 'version' => 'required',
            'title' => 'required',
            'content' => 'required',
            //'reference' => 'required',
        ]);
        
        //Instanciem l'objecte Article
        $article = new Article();

        // Afegim els diferents atributs a l'objecte el qual posteriorment guardarem.
        $article->id_project = $id_project;
        //$article -> version = $request->get('version');
        $article->version = '1';
        $article->title = $request->get('title');
        $article->content = $request->get('content');
        //$article -> reference = $request->get('reference');
        $article->reference = '';
        $article->id_user = $request->user()->id;
        $article->status = 'active';
        $article->save();
        Log::info('[ INSERT ] - articles - Nou article: '.$article->title.' !Inserit per: '.auth()->user()->id.'');
        

        //Retornem a la vista anterior.
        return redirect()->back();
    }


    
    /**
     * Busquem l'article amb la ID i retornem aquest a la vista.
     * 
     * @param  int  $id_article Conté la ID del projecte a cercar
     * @param  int  $id_project Conté la id del projecte que assignarem a l'article editat.
     * @return \Illuminate\Http\Response
     */
    public function edit($id_project, $id_article){
        $article = Article::where('id_article', '=', $id_article)->firstOrFail();
        return view('articles.edit', compact('article', 'id_project', 'id_article'));
    }


    /**
     * Actualitzem els camps titol i contingut d'un article.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_project Conté la id del projecte que assignarem a l'article editat.
     * @param  int  $id_article Conté la ID del projecte a cercar.
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_project, $id_article){

        //Establim que els camps següents siguin required i comprovem aquests.
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        
        //Cerquem l'article a actualitzar
        $article = Article::find($id_article);

        //Obtenim les dades del $request i afegim aquestes a l'article.
        $article->title = $request->get('title');
        $article->content = $request->get('content');
        
        //Guardem els nous valors dels camps.
        $article->save();
        
        Log::info('[ UPDATE ] - articles - Article: '.$article->title.' Actualitzat per: '.auth()->user()->id.'');

        return redirect()->route('projects.show', compact('id_project','id_article'));
    }


    /**
     * Establir l'estat d'un article a inactive.
     * 
     * @param  int  $id_project Conté la id del projecte que assignarem a l'article editat.
     * @param  int  $id_article Conté la ID del projecte a cercar.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_project, $id_article){

        //Cerquem l'article a eliminar.
        $article = Article::find($id_article);

        //Establim el status d'aquest a innactiu, ja que relment no l'esborrem.
        $article->status = 'inactive';

        //Guardem aquest.
        $article->save();

        Log::info('[ DELETE ] - articles - Article: '.$article->title.' Eliminat per: '.$article->id_user.'');

        return redirect()->back();
    }
}
