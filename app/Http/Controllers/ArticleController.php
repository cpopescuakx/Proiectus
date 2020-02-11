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
        ->where('id_project', '=', $id_project);




        return view('articles.index', compact('username','articles','id_project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
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
            'creation_date' => 'required',
            'reference' => 'required',
            'status' => 'required',
        ]);

        $article = new Article();
        $article->id_project = $id_project;
        $article->version = $request->get('version');
        $article->title = $request->get('title');
        $article->content = $request->get('content');
        $article->reference = $request->get('reference');
        $article->id_user = $id_user;
        $article->status = $request->get('status');



        $article->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $id_article)
    {
        $article = Article::where('id_article', $id_article)->first();
        return view('articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_article)
    {
        $validatedData = $request->validate([
                  'id_article' => 'required',
                  'id_project' => 'required',
                  'version' => 'required',
                  'title' => 'required',
                  'content' => 'required',
                  'creation_date' => 'required',
                  'reference' => 'required',
                  'id_user' => 'required',
                  'status' => 'required',
              ]);
              Article::whereId($id_article)->update($validatedData);

              return redirect()->route('articles.index')->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')
                        ->with('success','Article deleted successfully');
    }
}
