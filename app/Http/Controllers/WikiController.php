<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wiki;
use App\Article;

class WikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id_project)
     {
       $wiki = Wiki::find($id_project);
       return view('Wiki.edit', compact('wiki', 'id_project'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id_project)
     {
         $this-> validate($request, [
             'title'    =>  'required'
         ]);
         $wikis = Wiki::find($id_project);
         $wikis->title = $request->get('title');
         $wikis->id_project = $id_project;

         $wikis->save();

         return redirect()->action('WikiController@index', ['id_project' => $id_project]);

         //return redirect()->route('Blog.index')->with('success', 'Data Updated');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
