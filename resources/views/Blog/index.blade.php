@extends('layouts.default')
@section('content')
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Projecte</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
        </ol>
    </nav>
</div>
@if ($blog != null)
<div class="container mb-5">
    <a href="{{$id_project}}/edit"><i style="font-size: 1rem" class="material-icons">edit</i></a>
    <h2 class="float-left">{{$blog->title}}</h2>
    <br><br>
    <form method="post" action="{{$id_project}}/post/store" id="postCreationForm">
        {{csrf_field()}}
        <div class="form-group">
            <h4><label class="float-left" cfor="exampleFormControlInput1">Crea un post!</label></h4>
            <div class="form-group">
                <input name="title" type="text" class="form-control" placeholder="Títol" required>
            </div>
            <!-- Textarea de l'editor de text -->
            <div class="form-group">
                <textarea name="content" id=summernote required></textarea>
            </div>

            <!-- Script per a inicialitzar l'editor de text-->
            <script>
                $('#summernote').summernote({
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
                        console.log('Introdueix el contingut del post!');
                        // Evitar el submit
                        e.preventDefault();
                    }
                });
                /** CODI PER AL MENU RIGHTCLICK */
                /** ---------- NO FUNCIONA ----------- */
                $('#prova').on('contextmenu', function(e) {
                    var top = e.pageY - 40;
                    var left = e.pageX - 60;
                    $("#context-menu").css({
                        display: "block",
                        top: top,
                        left: left
                    }).addClass("show");
                    return false; //blocks default Webbrowser right click menu
                }).on("click", function() {
                    $("#context-menu").removeClass("show").hide();
                });

                $("#context-menu a").on("click", function() {
                    $(this).parent().removeClass("show").hide();
                });
            </script>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary float-right">Crea'l!</button>
        </div>
    </form>
</div>
<br>
</div>
<div class="container">

    @if($posts->count())
    @foreach ($posts as $post)
    <!-- Confirmació d'eliminació d'un post -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Estàs segur d'eliminar el post?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancela</button>
                    <a type="button" class="btn btn-danger" href="{{$id_project}}/post/{{$post->id_post}}/destroy">Elimina</a>
                </div>
            </div>
        </div>
    </div>
<!-- Menu d'opcins rightclick -->
    <div class="dropdown-menu dropdown-menu-sm" id="context-menu">
            <h6 class="dropdown-header">Opcions del post</h6>
          <a class="dropdown-item" href="#">Eliminar</a>
          <a class="dropdown-item" href="#">Modificar</a>
          <a class="dropdown-item" href="#"></a>
        </div>

    <div class="card mb-3">
        <div class="card-body">
            <a class="float-right" href="{{$id_project}}/post/{{$post->id_post}}/edit"><i style="font-size: 140%" class="material-icons">edit</i></a>
            <!--<a class="float-right" href="{{$id_project}}/post/{{$post->id_post}}/destroy" ><i style="font-size: 1rem" class="material-icons">delete</i></a>
                    -->
            <a class="float-right" data-toggle="modal" data-target="#deleteConfirmationModal"><i style="font-size: 140%" class="material-icons text-primary">delete</i></a>

            <a href="{{$id_project}}/post/{{$post->id_post}}">

                <h5 class="card-title">{{$post->title}}</h5>
            </a>
            <div class="">
                <!-- <p class="card-text">{!!\Illuminate\Support\Str::limit($post->content, $limit = 200, $end = '...')!!}</p> -->
                <p class="card-text">{!!$post->content!!}</p>

            </div>
        </div>
        <div class="card-footer text-muted">
            <footer class="blockquote-footer float-right"> Creat per <a href=""> <cite title="Source Title"> {{$post->id_user}}</cite></a> el {{$post->created_at}}</footer>
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
@endsection
