@extends('layouts.default')

@section('content')
<div class=" formulari ">
    <form class="was-validated" action="{{ route('schools.update', $school->id_school) }}" method="POST" name="update_product">
        {{ csrf_field() }}
        @method('POST')
        <div class="row justify-content-center">
            <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-10">
                <div class="container">
                    <div class="contact-image text-center mt-3">
                        <img class="form-img" src="{{ asset('img/icono_negro.png') }}" />
                    </div>
                </div>
                <div class="container contact-form">
                    <div class="container">
                        <div class="row no-gutters justify-content-center mt-5">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <h1>MODIFICAR INSTITUT</h1>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <strong>NOM</strong>
                                <input type="text" name="name" class="form-control" placeholder="Empresa1" value="{{ $school->name }}">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <strong>EMAIL</strong>
                                <input type="text" name="email" class="form-control" placeholder="info@exemple.com" value="{{ $school->email }}">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <strong>CODI</strong>
                                <input type="text" name="code" class="form-control" placeholder="1564687" value="{{ $school->code }}">
                                <span class="text-danger">{{ $errors->first('code') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <strong>TIPUS</strong>
                                <input type="text" name="type" class="form-control" placeholder="Batxillerat" value="{{ $school->type }}">
                                <span class="text-danger">{{ $errors->first('type') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <button type="submit" name="sbumit" class="btn btn-primary">ENVIA</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</div>
</form>
</div>
@stop