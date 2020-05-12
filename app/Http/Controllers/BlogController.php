<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    /**
     * Retorna la vista de la wiki passant-li els articles i la wiki.
     * 
     * @param int $id_project
     * @var blog variable per emmagatzemar la blog que sigui del projecte que hem passat.
     * @var posts variable per emmagatzemar tots els posts que siguin del projecte que hem passat.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id_project)
    {
        $posts = Post::all()
        ->sortByDesc('created_at')
        ->where('id_project', '=', $id_project)
        ->where('status', '=', 'active');

        $blog = Blog::find($id_project);

        return view('Blog.index', compact('posts', 'id_project', 'blog'));
    }

    /**
     * Retorna la vista d'edició passant-li la wiki.
     *
     * @param  int  $id_project
     * @var blog variable per emmagatzemar la blog que sigui del projecte que hem passat. 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id_project)
    {
      $blog = Blog::find($id_project);
      return view('Blog.edit', compact('blog', 'id_project'));
    }

    /**
     * Actualitza el títol del blog i retorna la vista d'aquesta.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id_project
     * @var blog variable que busca la blog per el paràmetre id_project, canvia el títol d'aquesta i ho guarda.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id_project)
    {
        $this-> validate($request, [
            'title'    =>  'required'
        ]);
        $blog = Blog::find($id_project);
        $oldBlog = Blog::find($id_project);
        $blog->title = $request->get('title');
        $blog->id_project = $id_project;
        $blog->save();

        Log::info('[ UPDATE ] - blogs - El blog: '. $oldBlog->title .' ha estat actualitzat a: '. $blog->title .' per: '.auth()->user()->id.'.');

        return redirect()->action('ProjectController@show', ['id_project' => $id_project]);
    }
}
