@extends('articles.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('articles.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('articles.store') }}" method="POST">
    @csrf

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>id_article:</strong>
                <input type="text" name="id_article" class="form-control" placeholder="id_article">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>id_project:</strong>
                <textarea class="form-control" style="height:150px" name="id_project" placeholder="id_project"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>version:</strong>
                <textarea class="form-control" style="height:150px" name="version" placeholder="version"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>title:</strong>
                <textarea class="form-control" style="height:150px" name="title" placeholder="title"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>content:</strong>
                <textarea class="form-control" style="height:150px" name="content" placeholder="content"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>creation_date:</strong>
                <textarea class="form-control" style="height:150px" name="creation_date" placeholder="creation_date"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>reference:</strong>
                <textarea class="form-control" style="height:150px" name="reference" placeholder="reference"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>id_user:</strong>
                <textarea class="form-control" style="height:150px" name="id_user" placeholder="id_user"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>status:</strong>
                <textarea class="form-control" style="height:150px" name="status" placeholder="status"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
