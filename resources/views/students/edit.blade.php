@extends('layouts.default')

@section('content')
    <div class="content formulari closed">
        <form class="was-validated" action="{{route('students.update', [$student->id])}}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-10">
                    <div class="container">
                        <div class="contact-image text-center mt-3">
                            <img class="form-img" src="./img/icono_negro.png" />
                        </div>
                    </div>
                    <div class="container contact-form">
                        <div class="container">
                            <div class="row no-gutters justify-content-center mt-5">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <h1>Modificar Alumne</h1>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="nom">Nom</label>
                                    <input type="text" name = "firstname" class="form-control" value = "{{$student->firstname }}" id="firstname" required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="cognom">Cognom</label>
                                    <input type="text" name = "lastname" class="form-control" value = "{{$student->lastname }}" id="lastname" required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="usuari">Usuari</label>
                                    <input type="text" name = "name" class="form-control" value = "{{$student->name }}" id="name" required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="dni">DNI</label>
                                    <input type="text" name = "dni" class="form-control" value = "{{$student->dni }}" id="dni" required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="dni">Ciutat</label>
                                        <datalist id = "cities">
                                            @foreach($cities as $city)
                                                <option value="{{$city->name}}">
                                            @endforeach
                                        </datalist>
                                        <input type="text" name = "city" class="form-control" value = "{{ $nom }}" list="cities" required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="data-naixement">Data naixement</label>
                                    <input type="text" name = "birthdate" class="form-control" value = "{{$student->birthdate }}" id="birthdate" required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="email">Email</label>
                                    <input type="text" name = "email" class="form-control" value = "{{$student->email }}" id="email" required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="contrassenya">Contrassenya</label>
                                    <input type="text" name = "password" class="form-control" value = "{{$student->password }}" id="password" required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
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
