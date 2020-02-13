<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index($id_project)
    {
        $articles = Article::all()
        ->where('id_project', '=', $id_project)->where('status', '=', 'active');

        return view('articles.index', compact('articles','id_project'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create($id_project)
    {
        return view('articles.create', compact('id_project'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request, $id_project)
    {
        $id_user = 9;

        $request->validate([
            'version' => 'required',
            'title' => 'required',
            'content' => 'required',
            'reference' => 'required',
        ]);

        $article = new Article();
        $article -> id_project = $id_project;
        $article -> version = $request->get('version');
        $article -> title = $request->get('title');
        $article -> content = $request->get('content');
        $article -> reference = $request->get('reference');
        $article -> id_user = $id_user;
        $article -> status = 'active';



        $article->save();

        return redirect()->route('wiki', ['$id_project' => $id_project]);;;
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
            'version' => 'required',
            'title' => 'required',
            'content' => 'required',
            'reference' => 'required',
            'id_user' => 'required',
        ]);

        $article = Article::find($id_article);

        $article -> version = $request -> get('version');
        $article -> title = $request -> get('title');
        $article -> content = $request -> get('content');
        $article -> reference = $request -> get('reference');
        $article -> id_user = $request -> get('id_user');

        $article->save();

        return redirect()->back()->back();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */


    public function destroy($id_article)
    {
        $article = Article::find($id_article);

        $article -> status = 'inactive';

        $article->save();

        return redirect()->back();
    }


}
