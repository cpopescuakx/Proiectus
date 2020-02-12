@extends('layouts.default')
@section('content')

<div class="card-body">
    <a class="float-right" href=""><i style="font-size: 1rem" class="material-icons">edit</i></a>
        <h5 class="card-title">{{$post->title}}</h5>
    </a>
    <div class="">
        <p class="card-text">{!!$post->content!!}</p>

    </div>
</div>

    <footer class="blockquote-footer float-right"> Creat per <a href=""> <cite title="Source Title"> {{$post->id_user}}</cite></a> el {{$post->created_at}}</footer>


@endsection