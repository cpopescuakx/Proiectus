@extends('layouts.default')
@section('content')

<div class="formulari">
    <form class="was-validated" action="{{route('blogs.update', $id_project)}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PATCH" />
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
                                <h1>Modificar Títol</h1>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <label for="nom">Títol</label>
                                <input type="text" name = "title" class="form-control" id="title" value="{{$blogs->title}}" required>
                                <div class="invalid-feedback">Camp necessari</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                              <a class="btn btn-primary float-left" href="{{ URL::previous() }}"> Cancel·lar</a>
                                <button type="submit" name = "sbumit" class="btn btn-primary float-right">Modificar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
