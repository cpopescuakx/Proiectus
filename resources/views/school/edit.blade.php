@extends('school.layout')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">EDITA INSTITUT</a></h2>
<br>

<form action="{{ route('school.update', $school->id_school) }}" method="POST" name="update_product">
{{ csrf_field() }}
@method('POST')

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>EMAIL</strong>
            <input type="text" name="email" class="form-control" placeholder="info@exemple.com" value="{{ $school->email }}">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>NOM</strong>
            <input type="text" name="name" class="form-control" placeholder="Empresa1" value="{{ $school->name }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>CODI</strong>
            <input type="text" name="code" class="form-control" placeholder="1564687" value="{{ $school->code }}">
            <span class="text-danger">{{ $errors->first('code') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>TIPUS</strong>
            <input type="text" name="type" class="form-control" placeholder="Batxillerat" value="{{ $school->type }}">
            <span class="text-danger">{{ $errors->first('type') }}</span>
        </div>
    </div>


    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">ENVIA</button>
    </div>
</div>

</form>
@endsection
