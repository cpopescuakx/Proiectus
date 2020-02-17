@extends('layouts.default')
@section('content')
<br><br>
@if ($wiki != null)
        <div class="container mb-5">
          <a href="{{$id_project}}/edit" ><i style="font-size: 1rem" class="material-icons">edit</i></a>
          <h2 class = "float-left">{{$wiki->title}}</h2>
            <br><br>
            <form method="POST" action="{{$id_project}}/store" id="postCreationForm">
            {{csrf_field()}}
                <div class="form-group">
                    <h4><label class ="float-left" cfor="exampleFormControlInput1">Crea un article!</label></h4>
                    <div class="form-group">
                        <input name="title" type="text" class="form-control" placeholder="Titol del article" required>
                    </div>
                    <!-- Textarea de l'editor de text -->
                    <div class="form-group">
                        <textarea name="content" id=summernote></textarea>
                    </div>

                    <!-- Script per a inicialitzar l'editor de text-->
                    <script>
                        $('#summernote').summernote({
                            placeholder: 'Contingut del article',
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
        </div>
        <div class="container">
        @if($articles->count())
        @foreach ($articles as $article)
                <div class="card mb-3">
                    <div class="card-body">
                    <a class="float-right" href="{{action('ArticleController@edit', $wiki->id_project)}}" ><i style="font-size: 1rem" class="material-icons">edit</i></a>
                        <a href="#">
                            <h5 class="card-title">{{$article->title}}</h5>
                        </a>
                        <div class="">
                            <p class="card-text">{!!$article->content!!}</p>

                        </div>
                    </div>
                    <div class="card-footer text-muted">
                    <footer class="blockquote-footer float-right"> Creat per <a href=""> <cite title="Source Title"> {{$article->id_user}}</cite></a> el {{$article->created_at}}</footer>
                    </div>
                </div>
                @endforeach
                @else
                <h3>No hi ha cap article en aquesta wiki</h3>
                @endif
        </div>
@else
<div class="container mb-5">
<h1>Aquest article no existeix</h1>
</div>
@endif
@endsection
