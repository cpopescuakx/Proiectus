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
  <div style="padding: 10px">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Article</h2>
                </br>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('wiki', [$id_project]) }}"> Enrere</a>
                <br></br>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> S'han produït alguns problemes amb la vostra entrada.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="update" method="POST">
      @csrf

         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>version:</strong>
                    <input type="text" name="version" value="{{ $article->version }}" class="form-control" placeholder="version">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>title:</strong>
                    <input type="text" name="title" value="{{ $article->title }}" class="form-control" placeholder="title">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>content:</strong>
                    <input type="text" name="content" value="{{ $article->content }}" class="form-control" placeholder="content">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>reference:</strong>
                    <input type="text" name="reference" value="{{ $article->reference }}" class="form-control" placeholder="reference">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>id_user:</strong>
                    <input type="text" name="id_user" value="{{ $article->id_user }}" class="form-control" placeholder="id_user">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Modifica!</button>
            </div>
        </div>

    </form>
  </div>
@endsection
