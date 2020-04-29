@inject('user', 'App\Http\Controllers\UserController') {{-- Importa el controlador de user --}}
@if ($wiki != null)
<div class="container mb-5">
    @if(Auth::user()->id_role == 1)
    <a href="{{route('wiki.edit', $id_project)}}" ><i style="font-size: 1rem" class="material-icons" alt="Icona per a editar">edit</i></a>
    @endif
    <h2 class="float-left">{{$wiki->title}}</h2>
    <br><br>
    <form method="POST" action="{{route('article.store', $id_project)}}" id="postCreationForm">
        {{csrf_field()}}
        <div class="form-group">
            <h4><label class="float-left" cfor="exampleFormControlInput1">Crea un article!</label></h4>
            <div class="form-group">
                <input name="title" type="text" class="form-control" placeholder="Títol" required>
            </div>
            <!-- Textarea de l'editor de text -->
            <div class="form-group">
                <textarea name="content" id=summernoteWiki></textarea>
            </div>

            <!-- Script per a inicialitzar l'editor de text-->
            <script>
                $('#summernoteWiki').summernote({
                    placeholder: 'Contingut',
                    tabsize: 2,
                    height: 100,
                    minHeight: 100,
                    maxHeight: 400
                });


                /* Comprovem si el contingut del post esta buit al fer submit i
                    evitem continuar si està buit
                */
                $('#postCreationForm').on('submit', function(e) {
                    // Comprovem si el contingut del post esta buit
                    if ($('#summernote').summernote('isEmpty')) {
                        console.log('Introdueix el contingut del article!');
                        // Evitar el submit
                        e.preventDefault();
                    }
                })
            </script>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary float-right">Crea'l!</button>
        </div>
    </form>
</div>
<br>

<div class="container">
    @if($articles->count())
    @foreach ($articles as $article)
    <!-- Confirmació d'eliminació d'un article -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Estàs segur d'eliminar l'article?</h5>
                    <button type="button" name="opcio" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" name="cancelar" class="btn btn-success" data-dismiss="modal">Cancela</button>
                    <a type="button" class="btn btn-danger" href="{{$id_project}}/article/{{$article->id_article}}/destroy">Elimina</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            @if(Auth::user()->id == $article->id_user || (Auth::user()->id_role == 1))
            <a class="float-right" href="{{$id_project}}/article/{{$article->id_article}}/edit"><i style="font-size: 140%" class="material-icons" alt="Icona per a editar" >edit</i></a>
            <a class="float-right" data-toggle="modal" data-target="#deleteConfirmationModal"><i style="font-size: 140%" class="material-icons text-primary" alt="Icona per a eliminar">delete</i></a>
            @endif
            <a href="#">
                <h5 class="card-title">{{$article->title}}</h5>
            </a>
            <div class="">
                <p class="card-text">{!!$article->content!!}</p>

            </div>
        </div>
        <div class="card-footer text-muted">
            <footer class="blockquote-footer float-right"> Creat per <a href="{{route('managers.indexP1',[$article->id_user])}}"> <cite title="Source Title"> {{($user::getUser($article->id_user))->username}}</cite></a> el {{$article->created_at}}</footer>
        </div>
    </div>
    @endforeach
    @else
    <h3>No hi ha cap article en aquesta wiki</h3>
    @endif
</div>
@else
<div class="container mb-5">
    <h1>Aquesta wiki no existeix</h1>
</div>
@endif
