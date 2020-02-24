@extends('layouts.default')
@section('content')
<div>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Projecte</a></li>
      <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Blog</a></li>
      <li class="breadcrumb-item active" aria-current="page">Post</li>
    </ol>
  </nav>
</div>

<div class="container mb-5">
  <footer class="blockquote-footer float-right"> Creat per <a href=""> <cite title="Source Title"> {{$post->id_user}}</cite></a> el {{$post->created_at}}</footer>
  <br><br>
    <a class="float-right" href="{{$post->id_post}}/edit"><i style="font-size: 140%" class="material-icons">edit</i></a>
    <a class="float-right" data-toggle="modal" data-target="#deleteConfirmationModal"><i style="font-size: 140%" class="material-icons text-primary">delete</i></a>

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
                    <a type="button" class="btn btn-danger" href="{{$post->id_post}}/destroy">Elimina</a>
                </div>
            </div>
        </div>
    </div>
        <h5 class="card-title border-bottom">{{$post->title}}</h5>
    <div class="">
        <p class="card-text">{!!$post->content!!}</p>
    </div>


</div>
@endsection
