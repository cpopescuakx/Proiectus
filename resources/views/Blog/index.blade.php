@extends('layouts.default')
@section('content')
<br><br>
@if ($blog != null)
        <div class="container mb-5">
          <a href="{{action('BlogController@edit', [$blog->id_projecte])}}" ><i style="font-size: 1rem" class="material-icons">edit</i></a>
          <h2 class = "float-left">{{$blog->title}}</h2>
            <br><br>
            <form method="post" action="{{$id_project}}/post/store" id="postCreationForm">
            {{csrf_field()}}
                <div class="form-group">
                    <h4><label class ="float-left" cfor="exampleFormControlInput1">Crea un post!</label></h4>
                    <div class="form-group">
                        <input name="title" type="text" class="form-control" placeholder="Titol del post" required>
                    </div>
                    <!-- Textarea de l'editor de text -->
                    <div class="form-group">
                        <textarea name="content" id=summernote></textarea>
                    </div>

                    <!-- Script per a inicialitzar l'editor de text-->
                    <script>
                        $('#summernote').summernote({
                            placeholder: 'Contingut del post',
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
        @if($posts->count())
        @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <a href="post/{{$post->id_post}}">
                            <h5 class="card-title">{{$post->title}}</h5>
                        </a>
                        <div class="">
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
