@extends('layouts.default')

@section('content')
<div class=" formulari ">
    <form class="was-validated" action="{{ route('schools.store') }}" method="POST" name="add_product">
        @csrf
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
                                <h1>AFEGIR INSTITUT</h1>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <strong>NOM</strong>
                                <input type="text" name="name" class="form-control" placeholder="Institut1">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <strong>EMAIL</strong>
                                <input type="text" name="email" class="form-control" placeholder="info@exemple.com">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <strong>CODI</strong>
                                <input type="text" class="form-control" col="4" name="code" placeholder="1564687"></textarea>
                                <span class="text-danger">{{ $errors->first('code') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <strong>TIPUS</strong>
                                <input type="text" class="form-control" col="4" name="type" placeholder="Batxillerat"></textarea>
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