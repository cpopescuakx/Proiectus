@extends('layouts.default')

@section('content');
<body>

    <div class="formulari">

      <form action='{{ route('projects.store') }}' method='POST' class="was-validated" >
        @csrf
          <!-- inicio formulario -->
          <div class="row justify-content-center">

              <!-- grid container formulario-->
              <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-10">

                  <!-- Imagen formulario -->
                  <div class="container">
                      <div class="contact-image text-center mt-3">
                        <img class="form-img" src="{{ asset('img/icono_negro.png') }}" />
                    </div>
                  </div>

                  <!-- container formulario -->
                  <div class="container contact-form">


                      <div class="container">
                          <div class="row no-gutters justify-content-center mt-5">
                              <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                  <h1>Crea un projecte nou.</h1>
                              </div>
                          </div>
                      </div>

                      <!-- Input básico -->
                      <div class="form-group mt-4">
                          <div class="row justify-content-center">
                              <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                  <label for="exampleFormControlInput1">Nom del Projecte</label>
                                  <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Proiectus" name="name" required>

                              </div>
                          </div>
                      </div>
                      <!-- fin input básico -->

                      <!-- Input básico -->
                      <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <label for="exampleFormControlInput1">Pressupost</label>
                                <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="200" name="budget" required>

                            </div>
                        </div>
                    </div>
                    <!-- fin input básico -->

                    <!-- Input básico -->
                    <div class="form-group mt-4">
                      <div class="row justify-content-center">
                          <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                              <label for="exampleFormControlInput1">Descripció</label>
                              <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Projecte centrat a la programació" name="desc" required>

                          </div>
                      </div>
                  </div>
                  <!-- fin input básico -->

                  <!-- Input básico -->
                  <div class="form-group mt-4">
                    <div class="row justify-content-center">
                        <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                            <label for="exampleFormControlInput1">Familia Professional</label>
                            <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Informàtica" name="pro_family" required>

                        </div>
                    </div>
                </div>
                <!-- fin input básico -->

                <!-- Input básico -->
                <div class="form-group mt-4">
                  <div class="row justify-content-center">
                      <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                          <label for="exampleFormControlInput1">Data de finalització <br> (yyy-mm-dd)</label>
                          <input type="name" class="form-control" id="exampleFormControlInput1" name="end_date">
                      </div>
                  </div>
                </div>
              <!-- fin input básico -->

                <!-- Botó confirmar -->
                <div class="form-group">
                  <div class="row justify-content-center">
                      <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                          <button name='crear' value='Crear' type="submit" class="btn btn-primary float-right">Confirmar</button>
                      </div>
                  </div>
              </div>
                <!-- fin botó confirmar -->

                  </div>
                  <!-- fin container formulario -->

              </div>
              <!--  fin grid container formulario-->

          </div>
          <!-- fin formulario -->
      </form>

</body>
@stop


