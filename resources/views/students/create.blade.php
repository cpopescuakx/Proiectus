@extends('layouts.default')

@section('content')
    <div class="content formulari closed">
        <form class="was-validated" action="{{route('students.store')}}" method="POST">
            @csrf
        <!-- inicio formulario -->
          <div class="row justify-content-center">
            <!-- grid container formulario-->
            <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-10">
                <!-- Imagen formulario -->
                <div class="container">
                  <div class="contact-image text-center mt-3">
                     <img class="form-img" src="./img/icono_negro.png" />
                  </div>
                </div>
                <div class="container contact-form">
                  <div class="container">
                      <div class="row no-gutters justify-content-center mt-5">
                          <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                              <h1>Crear Alumne</h1>
                          </div>
                      </div>
                  </div>
                   <!-- AQUI VAN ELS INPUTS -->
                   <div class="form-group mt-4">
                    <div class="row justify-content-center">
                      <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                        <label for="exampleFormControlInput1">Nom</label>
                        <input type="text" name = "firstname" class="form-control" id="exampleFormControlInput1" required>
                        <div class="invalid-feedback">Camp necessari</div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mt-4">
                    <div class="row justify-content-center">
                      <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                        <label for="exampleFormControlInput1">Cognom</label>
                        <input type="text" name = "lastname" class="form-control" id="exampleFormControlInput1" required>
                        <div class="invalid-feedback">Camp necessari</div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mt-4">
                    <div class="row justify-content-center">
                      <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                        <label for="exampleFormControlInput1">Usuari</label>
                        <input type="text" name = "name" class="form-control" id="exampleFormControlInput1" required>
                        <div class="invalid-feedback">Camp necessari</div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mt-4">
                    <div class="row justify-content-center">
                      <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                        <label for="exampleFormControlInput1">DNI</label>
                        <input type="text" name = "dni" class="form-control" id="exampleFormControlInput1" required>
                        <div class="invalid-feedback">Camp necessari</div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mt-4">
                    <div class="row justify-content-center">
                      <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                        <label for="exampleFormControlInput1">Data naixement</label>
                        <input type="text" name = "birthdate" class="form-control" id="exampleFormControlInput1" required>
                        <div class="invalid-feedback">Camp necessari</div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mt-4">
                    <div class="row justify-content-center">
                      <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="text" name = "email" class="form-control" id="exampleFormControlInput1" required>
                        <div class="invalid-feedback">Camp necessari</div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mt-4">
                    <div class="row justify-content-center">
                      <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                        <label for="exampleFormControlInput1">Contrassenya</label>
                        <input type="text" name = "password" class="form-control" id="exampleFormControlInput1" required>
                        <div class="invalid-feedback">Camp necessari</div>
                      </div>
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
