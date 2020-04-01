<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Post.index', compact('post'));
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
    public function store(Request $request, $id_project)
    {
        
        $request->validate(['title'=>'required','content'=>'required']);

        $post = new Post();
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->id_project = $id_project;
        $post->id_user = $request->user()->id;

        $post->save();

        return redirect()->back();
    }

    /**
     * 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_project, $id_post)
    {
        $post = Post::find($id_post);
        return view('Post.show', compact('post'));
    }

    /**
     * API Restful dels Posts
     * 
     * Retorna tots els posts existents.
     * 
     * @return Post 
     */
    public function showApi()
    {
        return Post::All();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_project, $id_post)
    {
        $post=Post::find($id_post);
        return view('Post.edit', compact('post', 'id_project', 'id_post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_project, $id_post)
    {
        Post::find($id_post)->update($request->all());

        return redirect()->action('ProjectController@show', ['id_project' => $id_project]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_project, $id_post)
    {
      $post = Post::find($id_post);
      $post->status='inactive';
      $post-> save();

      return redirect()->back();

    }


    
}
