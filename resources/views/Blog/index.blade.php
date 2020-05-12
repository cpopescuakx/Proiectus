@inject('user', 'App\Http\Controllers\UserController') {{-- Importa el controlador de user --}}
@if ($blog != null)
<div class="container mb-5">
    @if(Auth::user()->id_role == 1)
    <a class="custom-link" href="{{route('blog.edit', $id_project)}}"><i style="font-size: 1rem" class="material-icons" alt="Icona per a modificar">edit</i></a>
    @endif
    <h2 class="float-left">{{$blog->title}}</h2>
    <br><br>
    <form method="post" action="{{route('post.store', $id_project)}}" id="postCreationForm">
        {{csrf_field()}}
        <div class="form-group">
            <h4><label class="float-left" cfor="exampleFormControlInput1">Crea un post!</label></h4>
            <div class="form-group">
                <input name="title" type="text" class="form-control" placeholder="Títol" required>
            </div>
            <!-- Textarea de l'editor de text -->
            <div class="form-group">
                <textarea name="content" id="summernoteBlog" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="create" class="btn btn-primary float-right">Crea'l!</button>
        </div>

        <br>
        </br>
    </form>

    <div>
      <form action="{{ route('post.index', $id_project) }}" method="get" class="form-inline">
        <div class="form-group">
          <input type="text" class="form-control" name="s" placeholder="Cerca blog" value="{{ isset($s) ? $s : '' }}">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Cerca</button>
        </div>

      </form>
    </div>
</div>

<div class="container">

    @if($posts->count())
    @foreach ($posts as $post)
    <!-- Confirmació d'eliminació d'un post -->
        <div class="modal fade" id="postDeleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Estàs segur d'eliminar el post?</h5>
                        <button type="button" name="opcio" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="cancelar" class="btn btn-success" data-dismiss="modal">Cancela</button>
                        <a type="button" class="btn btn-danger" href="{{route('post.destroy', [$id_project, $post->id_post])}}">Elimina</a>
                    </div>
                </div>
            </div>
        </div>
    <div class="card mb-3">
        <div class="card-body">
            @if(Auth::user()->id == $post->id_user || (Auth::user()->id_role == 1))
            <a class="float-right custom-link" href="{{route('post.edit', [$id_project, $post->id_post])}}"><i style="font-size: 140%" class="material-icons" alt="Icona per a modificar">edit</i></a>
            <a class="float-right" data-toggle="modal" data-target="#postDeleteConfirmationModal"><i style="font-size: 140%; color: #157e82;" class="material-icons" alt="Icona per a eliminar">delete</i></a>
            @endif
            <a class="custom-link" href="{{route('post.show', [$id_project, $post->id_post])}}">

                <h5 class="card-title">{{$post->title}} </h5>
            </a>
            <div class="">
                <p class="card-text">{!!$post->content!!}</p>

            </div>
        </div>
        <div class="card-footer text-muted">
            <footer class="blockquote-footer float-right"> Creat per <a class="custom-link" href="{{route('managers.indexP1',[$post->id_user])}}"> <cite title="Anar al perfil de {{($user::getUser($post->id_user))->username}}"> {{($user::getUser($post->id_user))->username}} </cite></a> el {{$post->created_at}}</footer>
        </div>
    </div>
    @endforeach
    
    @else
    <h3>No hi ha cap post en aquest blog</h3>
    @endif
</div>
@else
<div class="container mb-5">
    <h1>Aquest blog no existeix</h1>
</div>
@endif
