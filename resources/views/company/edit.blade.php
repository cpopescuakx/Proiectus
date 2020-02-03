@extends('company.layout')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">EDITA EMPRESA</a></h2>
<br>

<form action="{{ route('company.update', $company_info->id_company) }}" method="POST" name="update_product">
{{ csrf_field() }}
@method('POST')

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>EMAIL</strong>
            <input type="text" name="email" class="form-control" placeholder="info@exemple.com" value="{{ $company_info->email }}">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>NOM</strong>
            <input type="text" name="name" class="form-control" placeholder="Empresa1" value="{{ $company_info->name }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>NIF</strong>
            <input type="text" name="nif" class="form-control" placeholder="12345678N" value="{{ $company_info->nif }}">
            <span class="text-danger">{{ $errors->first('nif') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>SECTOR</strong>
            <input type="text" name="sector" class="form-control" placeholder="Informàtica" value="{{ $company_info->sector }}">
            <span class="text-danger">{{ $errors->first('sector') }}</span>
        </div>
    </div>


    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">ENVIA</button>
    </div>
</div>

</form>
@endsection
