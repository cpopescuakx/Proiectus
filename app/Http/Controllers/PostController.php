<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{

    // public function index(Request $request, $id_project, $id_post)
    // {
    //   $s = $request->input('s');
    //
    //   $post = Post::find($id_post);
    //       ->search($s)
    //       ->paginate(5);
    //
    //   return view ('Post.index' compact('post' , 's'));
    // }


    public function index($id_project){
        $post = Post::all()->where('id_project', '=', $id_project)->where('status', '=', 'active');
        return view('post.index', compact('post', 'id_project'));
    }











    /**
     * Guardar posts creats
     *
     * Comprova que els camps estiguin obligatoris estiguin inserits, agafa les dades dels altres i les afegeix al nou objecte .
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id_projecte Conté la id del projecte que forma part el post
     * @var post variable per a emmagatzemar les dades del nou post.
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

        Log::info(auth()->user()->id .' - [ INSERT ] - posts - Nou post: '. $post->title .'.');
        return redirect()->back();
    }

    /**
     * Mostrar posts existents
     *
     * Mijançant la id_post i utilitzant eloquent, agafem totes les dades del post i les enviem a la vista corresponent.
     *
     * @param  int  $id_project Conté la id del projecte el qual correspon el post.
     * @param  int  $id_post Conté la id del post a cercar.
     * @var post variable per emmagatzemar les dades el post cercat.
     * @return \Illuminate\Http\Response
     */
    public function show($id_project, $id_post)
    {
        $post = Post::find($id_post);
        return view('post.show', compact('post'));
    }

    /**
     * API Restful dels Posts
     *
     * Retorna tots els posts existents.
     *
     * @return Post[]|\Illuminate\Database\Eloquent\Collection
     */
    public function showApi()
    {
        return Post::All();
    }

    /**
     * Editar un post existent
     *
     * Mitjançant la id_post i utilitzant eloquent, agafem totes les dades d'aquest i les enviem a la vista per a mostrar-les en els camps.
     *
     * @param  int  $id_project Conté la id del projecte el qual correspon el post.
     * @param  int  $id_post Conté la id del post que estem editant.
     * @var post variable per emmagatzemar les dades el post cercat.
     * @return \Illuminate\Http\Response
     */
    public function edit($id_project, $id_post)
    {
        $post=Post::find($id_post);
        return view('post.edit', compact('post', 'id_project', 'id_post'));

    }

    /**
     * Actualitzar un post existent
     *
     * Mitjançant la id_post i utilitzant eloquent, cerquem el post i realitzem el update amb les dades retornades mitançant el request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_project Conté la id del projecte el qual correspon el post
     * @param  int  $id_post Conté la id del post que estem editant
     * @var post variable per emmagatzemar les dades el post cercat.
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_project, $id_post)
    {
        $post = Post::find($id_post);
        $oldPost = Post::find($id_post);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        Log::info(auth()->user()->id. ' - [UPDATE] - posts - El post: ' . $oldPost->title . ' ha estat actualitzat a: '. $post->title .'.');
        return redirect()->action('ProjectController@show', ['id_project' => $id_project]);

    }

    /**
     * Esborrar un post existent
     *
     * Mitjançant la id_post i utilitzant eloquent, cerquem el post i establim el seu estatus en inactiu, i després guardem aquest.
     *
     * @param  int  $id_project Conté la id del projecte el qual correspon el post
     * @param  int  $id_post Conté la id del post que estem editant
     * @var post variable per emmagatzemar les dades el post cercat i posteriorment modificar aquestes.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_project, $id_post)
    {

      //Cerquem post a eliminar.
      $post = Post::find($id_post);

      //Establim el status d'aquest a innactiu, ja que relment no l'esborrem.
      $post->status = 'inactive';

      //Guardem aquest.
      $post-> save();

      Log::info(''.auth()->user()->id." - [DELETE] - posts - El post: ". $post->title . ' ha estat eliminat');

      return redirect()->back();

    }
}
