@extends('layouts.default')

@section('content')
  <div style="padding: 10px">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ URL::previous() }}"> Enrere</a>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h3>{{ $article->title }}</h3>
                <hr/>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! $article->content !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group pull-right">
                {{ $article->created_at }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {{ $article->reference }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group pull-right text-muted">
                {{ App\User::find($article->id_user)->username }}
            </div>
        </div>
        
    </div>
  </div>
@endsection
