@extends('layouts.default')
@section('content')


<div class="formulari">
    <form class="was-validated" action="{{route('students.upload')}}" method="POST" enctype="multipart/form-data">
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
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6 text-center">
                                <h1>Importar alumnes</h1>
                            </div>
                        </div>
                    </div>

                    @if(session('errors'))
                        @foreach ($errors as $error)
                            <div class="alert alert-danger mt-2 mb-2" role="alert">
                                <i class="fas fa-exclamation-circle mr-3"></i> {{ $error }}
                            </div>  
                        @endforeach
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success mt-2 mb-2" role="alert">
                            <i class="fas fa-check-circle mr-3"></i> {{ session('success') }}
                        </div>
                        
                    @endif
    
                    @csrf

                    <div class="form-group resource-center w-100 mt-4"> 
                        <input required type="file" class="form-control" name="file">
                    </div>

                    <div class="d-flex justify-content-center">
                        <button style="background-color: #116466;" class="btn btn-primary mt-4 float-right" type="submit">Importar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>








@stop