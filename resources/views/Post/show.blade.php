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
    <br>
    <br>
    <a class="float-right" href="{{$post->id_post}}/edit"><i style="font-size: 1rem" class="material-icons">edit</i></a>
    <a class="float-right" href="{{$post->id_post}}/destroy" ><i style="font-size: 1rem" class="material-icons">delete</i></a>

        <h5 class="card-title border-bottom">{{$post->title}}</h5>
    <div class="">
        <p class="card-text">{!!$post->content!!}</p>

    </div>
    
</div>

@endsection
