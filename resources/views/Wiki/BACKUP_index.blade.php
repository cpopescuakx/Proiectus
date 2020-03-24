@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Wiki del projecte</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('post.create') }}" class="btn btn-info" >Crear wiki</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>ID</th>
               <th>Títol</th>
             </thead>
             <tbody>
              @if($wikis->count())
              @foreach($wikis as $wiki)
              <tr>
                <td>{{$wiki->id_project}}</td>
                <td>{{$wiki->title}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('WikiController@edit', $wiki->id_project)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('WikiController@destroy', $wiki->id_project)}}" method="post">
                   {{csrf_field()}}
                   
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="8">No hi ha cap wiki en aquest projecte</td>
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
