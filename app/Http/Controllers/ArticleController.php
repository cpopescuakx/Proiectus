<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

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

        $article = new Article();
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

        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */


    public function show($id_project, $id_article)
    {
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */


    public function edit($id_project, $id_article)
    {
        $article = Article::where('id_article', '=', $id_article)->firstOrFail();

        return view('articles.edit', compact('article', 'id_project', 'id_article'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id_project, $id_article)
    {
        //Forma curta
        //Article::find($id_article)->update($request->all());

        //forma llarga
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $article = Article::find($id_article);

        $article->title = $request->get('title');
        $article->content = $request->get('content');

        $article->save();

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */


    public function destroy($id_project, $id_article)
    {
        $article = Article::find($id_article);

        $article->status = 'inactive';

        $article->save();

        return redirect()->back();
    }
}
