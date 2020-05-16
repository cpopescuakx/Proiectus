@extends('layouts.default')
@inject('school_users', 'App\Http\Controllers\School_usersController')


@section('content')
    <div class="formulari">
        <form class="was-validated" action="{{route('students.update', [$student->id])}}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-10">
                    <div class="container">
                        <div class="contact-image text-center mt-3">
                            <img class="form-img" src="{{ asset('public/img/icono_negro.png') }}" />
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
                                    <label for="school">Centre al qual pertany*</label>
                                    <select data-size="10"
                                            class="selectpicker form-control"
                                            data-live-search="true"
                                            data-none-results-text="No s'han trobat coincidències"
                                            title="Tria una centre..."
                                            name="school"
                                            required>
                                        @foreach($schools as $school)
                                            <option data-tokens="{{$school->id_school}}"
                                                    value="{{$school->id_school}}"
                                                    @if(is_object($school_users::getUsersSchoolName($student->id)))
                                                        @if($school->id_school == $school_users::getUsersSchoolName($student->id)->id_school)
                                                            selected
                                                        @endif
                                                    @endif
                                            >{{$school->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Camp necessari</div>
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
                                    <input type="text" name = "username" class="form-control" value = "{{$student->username }}" id="username" required>
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
                                    <select data-size="10"
                                            class="selectpicker form-control"
                                            data-live-search="true"
                                            data-none-results-text="No s'han trobat coincidències"
                                            title="Tria una ciutat... (pots buscar mitjançant el codi postal)"
                                            name="city"
                                            required>
                                        @foreach($cities as $city)
                                            <option data-tokens="{{$city->postalcode}}"
                                                    value="{{$city->postalcode}}"
                                            @if($city->id_city == $student->id_city)
                                                selected
                                            @endif
                                            >{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="data-naixement">Data naixement</label>
                                    <input type="text"
                                           name="birthdate"
                                           class="datepicker form-control"
                                           pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])"
                                           id="birthdate-student"
                                           value="{{$student->birthdate }}"
                                           required>
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
                                    <label for="contrasenya">Contrasenya nova</label>
                                    <input type="text" name = "password" class="form-control" id="password">
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="contrasenya">Estat</label>
                                    <select class="form-control" name = "status" id="status">
                                        {{-- Mostrar l'estat actual de l'alumne --}}
                                        @if($student->status == "active")
                                            <option selected value="active">Actiu</option>
                                            <option value="inactive">Innactiu</option>
                                        @elseif($student->status == "inactive")
                                            <option value="active">Actiu</option>
                                            <option selected value="inactive">Innactiu</option>
                                        @endif
                                    </select>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <a role="button" class="btn btn-primary" href="{{URL::previous()}}">Enrere</a>
                                    <button type="submit" name="submit" class="btn btn-primary float-right">Modificar</button>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
        </form>
</div>
<script src="{{ asset('js/g2/students.create.js') }}"></script>
@endsection
