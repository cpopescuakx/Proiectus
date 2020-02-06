@extends('user.layout')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">AFEGIR EMPRESA</a></h2>
<br>

<form action="{{ route('companies.store') }}" method="POST" name="add_product">
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
            <input type="text" name="name" class="form-control" placeholder="Empresa1">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>NIF</strong>
            <textarea class="form-control" col="4" name="nif" placeholder="12345678N"></textarea>
            <span class="text-danger">{{ $errors->first('nif') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>SECTOR</strong>
            <textarea class="form-control" col="4" name="sector" placeholder="Informatica"></textarea>
            <span class="text-danger">{{ $errors->first('sector') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">ENVIA</button>
    </div>
</div>

</form>
@endsection
