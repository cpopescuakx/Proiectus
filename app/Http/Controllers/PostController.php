<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
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
        return view('Post.edit', compact('post', 'id_project', 'id_post'));

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
        Post::find($id_post)->update($request->all());

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
      $post = Post::find($id_post);
      $post->status='inactive';
      $post-> save();

      return redirect()->back();

    }
}
