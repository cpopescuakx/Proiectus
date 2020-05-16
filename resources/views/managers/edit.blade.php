@extends('layouts.default')

@section('content')
    <div class="content formulari closed">
        <form class="was-validated" action="{{route('managers.update', [$managers->id])}}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-10">
                    <div class="container">
                        <div class="contact-image text-center mt-3">
                            <img class="form-img" src="{{ asset('public/img/icono_negro.png') }}" alt="proiectus.cat"/>
                        </div>
                    </div>
                    <div class="container contact-form">
                        <div class="container">
                            <div class="row no-gutters justify-content-center mt-5">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <h1>Modificar Gestors</h1>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="nom">Nom</label>
                                    <input type="text" name = "firstname" class="form-control" value = "{{$managers->firstname }}" autocomplete="name" id="firstname" required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="cognom">Cognom</label>
                                    <input type="text" name = "lastname" class="form-control" value = "{{$managers->lastname }}" autocomplete="lastname" id="lastname" required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="usuari">Usuari</label>
                                    <input type="text" name = "username" class="form-control" value = "{{$managers->username }}" autocomplete="username" id="username" required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="dni">DNI</label>
                                    <input type="text" name = "dni" class="form-control" value = "{{$managers->dni }}" id="dni" required>
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
                                        <input type="text" name = "city" class="form-control" value = "{{ $nomCiutat }}" list="cities" autocomplete="address-level2" required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="data-naixement">Data naixement</label>
                                    <input type="date" name = "birthdate" class="form-control" value = "{{$managers->birthdate }}" autocomplete="bday" id="birthdate" required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="email">Email</label>
                                    <input type="email" name = "email" class="form-control" value = "{{$managers->email }}" autocomplete="email" id="email" required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="contrasenya">Contrasenya</label>
                                    <input type="password" name = "password" class="form-control" value = "{{$managers->password }}" autocomplete="new-password" id="password" required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="contrasenya">Estat</label>
                                    <select class="form-control" name = "status" id="status">
                                        {{-- Mostrar l'estat actual del gestor --}}
                                        @if($managers->status == "active")
                                            <option selected value="active">Actiu</option>
                                            <option value="inactive">Inactiu</option>
                                        @else
                                            <option value="active">Actiu</option>
                                            <option selected value="inactive">Inactiu</option>
                                        @endif
                                    </select>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <button type="submit" name = "edit" class="btn btn-primary float-right">Modificar</button>
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
