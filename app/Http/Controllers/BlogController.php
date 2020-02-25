<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Post;
use App\User;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_project)
    {

        // SELECT pt.id_post, pt.title, pt.content, pt.creation_date, pt.last_modified, pt.id_user, us.username
        // FROM POST pt
        // INNER JOIN USER us
        // ON us.id_user = pt.id_user
        // AND pt.status = 'active' AND pt.id_project = '$id_projecte'
        // ORDER BY pt.creation_date DESC


        // dd($id_project);
        $posts = Post::all()
        ->sortByDesc('created_at')
        ->where('id_project', '=', $id_project)
        ->where('status', '=', 'active');

        $blog = Blog::find($id_project);

            return view('Blog.index', compact('posts', 'id_project', 'blog'));
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
      $blogs = Blog::find($id_project);
      return view('Blog.edit', compact('blogs', 'id_project'));
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
        $blogs = Blog::find($id_project);
        $blogs->title = $request->get('title');
        $blogs->id_project = $id_project;

        $blogs->save();

        return redirect()->action('ProjectController@show', ['id_project' => $id_project]);

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
