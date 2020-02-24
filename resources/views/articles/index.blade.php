@extends('layouts.default')

@section('content')
<div style="padding: 10px">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Articles</h2>
                </br>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{$id_project}}/article/create">Crear</a>
                <br></br>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>id_article</th>
            <th>id_project</th>
            <th>version</th>
            <th>title</th>
            <th>content</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>reference</th>
            <th>id_user</th>
            <th>status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($articles as $article)
        <tr>
            <td>{{ $article->id_article }}</td>
            <td>{{ $article->id_project }}</td>
            <td>{{ $article->version }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->content }}</td>
            <td>{{ $article->created_at }}</td>
            <td>{{ $article->updated_at }}</td>
            <td>{{ $article->reference }}</td>
            <td>{{ $article->id_user }}</td>
            <td>{{ $article->status }}</td>
            <td>
                <form action="{{ route('articles.destroy',$article->id_article) }}" method="POST">
                    <a class="btn btn-primary" href="{{$id_project}}/article/{{$article->id_article}}/edit">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection