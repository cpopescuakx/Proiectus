@extends('user.layout')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">EDITA EMPRESA</a></h2>
<br>

<form action="{{ route('user.update', $user_info->id_user) }}" method="POST" name="update_product">
{{ csrf_field() }}
@method('POST')

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>EMAIL</strong>
            <input type="text" name="email" class="form-control" placeholder="info@exemple.com" value="{{ $user_info->email }}">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>NOM</strong>
            <input type="text" name="name" class="form-control" placeholder="Empresa1" value="{{ $user_info->name }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>NIF</strong>
            <input type="text" name="nif" class="form-control" placeholder="12345678N" value="{{ $user_info->nif }}">
            <span class="text-danger">{{ $errors->first('nif') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>SECTOR</strong>
            <input type="text" name="sector" class="form-control" placeholder="Informàtica" value="{{ $user_info->sector }}">
            <span class="text-danger">{{ $errors->first('sector') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>ESTAT</strong>
            <select class="form-control" value="{{$user_info->status}}" name="status">
              <option value="active">active</option>
              <option value="inactive">inactive</option>
            </select>
            <span class="text-danger">{{ $errors->first('status') }}</span>
        </div>
    </div>





    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">ENVIA</button>
    </div>
</div>

</form>
@endsection