@extends('layouts.default')

@section('content')
  <div style="padding: 10px">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="float-right custom-link" href="{{route('post.edit', [$id_project, $post->id_post])}}"><i style="font-size: 140%" class="material-icons" alt="Icona per a modificar">edit</i></a>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h3>{{ $post->title }}</h3>
                <hr/>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! $post->content !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group pull-right">
                {{ $post->created_at }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {{ $post->reference }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group pull-right text-muted">
                {{ App\User::find($post->id_user)->username }}
            </div>
        </div>

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-primary" href="/Dashboard/projects"> Enrere</a>
            </div>
        </div>

    </div>
  </div>
@endsection
