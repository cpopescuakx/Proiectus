@extends('layouts.default')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Posts del projecte</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="posts/create" class="btn btn-info" >Crear post</a>
            </div>
            <br>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Títol</th>
               <th>Contingut</th>
               <th>Projecte</th>
               <th>Usuari</th>
               <th>Data creació</th>
             </thead>
             <tbody>
              @if($posts->count())
              @foreach($posts as $post)
              <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                <td>{{$post->id_project}}</td>
                <td>{{$post->id_user}}</td>
                <td>{{$post->creation_date}}</td>
                <td><a class="btn btn-primary btn-xs" href="posts/edit/{{$post->id_post}}" ><i style="font-size: 1rem" class="material-icons">edit</i></a></td>
                <td>
                  <form action="{{action('PostController@destroy', $post->id_post)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs" type="submit"><i style="font-size: 1rem" class="small material-icons">delete</i></button>
                 </td>
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="8">No hi ha cap post en aquest blog</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
