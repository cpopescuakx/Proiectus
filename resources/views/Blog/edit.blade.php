@extends('layouts.default')
@section('content')
<div class="container mb-5">
<div class="row">
 <div class="col-md-12">
  <br />
  <h3>Editar Títol</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="update"">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <input type="text" name="title" class="form-control" value="{{$blogs->title}}" placeholder="Introdueix el títol" />
   </div>
   <div class="form-group">
    <button type="submit" class="btn btn-primary float-right">Editar!</button>

   </div>
  </form>
 </div>
</div>
</div>

@endsection
