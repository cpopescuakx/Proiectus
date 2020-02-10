@extends('layouts.default')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">AFEGIR INSTITUT</a></h2>
<br>

<form action="{{ route('schools.store') }}" method="POST" name="add_product">
{{ csrf_field() }}

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>EMAIL</strong>
            <input type="text" name="email" class="form-control" placeholder="info@exemple.com">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>NOM</strong>
            <input type="text" name="name" class="form-control" placeholder="Institut1">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>CODI</strong>
            <textarea class="form-control" col="4" name="code" placeholder="1564687"></textarea>
            <span class="text-danger">{{ $errors->first('code') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>TIPUS</strong>
            <textarea class="form-control" col="4" name="type" placeholder="Batxillerat"></textarea>
            <span class="text-danger">{{ $errors->first('type') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">ENVIA</button>
    </div>
</div>

</form>
@stop
