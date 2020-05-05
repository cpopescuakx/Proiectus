@extends('layouts.default')

@section('content')
    <div class="formulari">
        <form class="was-validated" action="{{route('students.store')}}" method="POST">
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
                                    <h1>Crear un Alumne</h1>
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
                                            data-style="btn-white"
                                            title="Tria una centre..."
                                            name="school"
                                            required>
                                        @foreach($schools as $school)
                                            <option data-tokens="{{$school->id_school}}" value="{{$school->id_school}}">{{$school->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="nom">Nom*</label>
                                    <input type="text"
                                           name="firstname"
                                           class="form-control"
                                           id="firstname"
                                           placeholder="Nom..."
                                           required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="cognom">Cognom*</label>
                                    <input type="text"
                                           name="lastname"
                                           class="form-control"
                                           id="lastname"
                                           placeholder="Cognom..."
                                           required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="usuari">Nom d'usuari*</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@</div>
                                        </div>
                                        <input type="text"
                                               name="username"
                                               class="form-control"
                                               id="username"
                                               pattern="[A-Za-z0-9_]{1,15}"
                                               placeholder="Nom d'usuari..."
                                               required>
                                    </div>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="dni">DNI*</label>
                                    <input type="text"
                                           name="dni"
                                           class="form-control"
                                           id="dni"
                                           pattern="[0-9]{8}[A-Za-z]{1}"
                                           placeholder="DNI..."
                                           required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="city">Ciutat*</label>
                                        <select data-size="10"
                                                class="selectpicker form-control"
                                                data-live-search="true"
                                                data-none-results-text="No s'han trobat coincidències"
                                                data-style="btn-white"
                                                title="Tria una ciutat... (pots buscar mitjançant el codi postal)"
                                                name="city"
                                                required>
                                            @foreach($cities as $city)
                                                <option data-tokens="{{$city->postalcode}}" value="{{$city->postalcode}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="data-naixement">Data naixement*</label>
                                    <input type="text"
                                           name="birthdate"
                                           class="datepicker form-control"
                                           pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])"
                                           id="birthdate-student"
                                           autocomplete="off"
                                           placeholder="AAAA-mm-dd"
                                           required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="email">Email*</label>
                                    <input type="text"
                                           name="email"
                                           class="form-control"
                                           id="email"
                                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                           placeholder="Correu..."
                                           required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="contrassenya">Contrassenya*</label>
                                    <input type="password"
                                           name="password"
                                           class="form-control"
                                           id="password"
                                           placeholder="Contrassenya provisional..."
                                           required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <a role="button" class="btn btn-primary" href="{{URL::previous()}}">Enrere</a>
                                    <button type="submit" name = "submit" class="btn btn-primary float-right" value="true">Crear</button>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted">(*) Camp necessari</p>
                    </div>
                </div>
            </div>
    </form>
</div>
@section('custom-scripts')
    <script src="{{ asset('js/g2/students.create.js') }}"></script>
@endsection

@endsection
