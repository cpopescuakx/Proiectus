@extends('articles.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Prova</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{$id_project}}/article/create">Create</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
          <th>id_article</th>
          <th>id_project</th>
          <th>version</th>
          <th>title</th>
          <th>content</th>
          <th>creation_date</th>
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
            <td>{{ $article->creation_date }}</td>
            <td>{{ $article->reference }}</td>
            <td>{{ $article->id_user }}</td>
            <td>{{ $article->status }}</td>
            <td>
                <form action="{{ route('articles.destroy',$article->id_article) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('articles.edit',$article->id_article) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
