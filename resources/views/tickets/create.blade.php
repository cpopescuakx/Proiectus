@extends('layouts.default')

@section('content')
<body>
      {{-- <h1>Crear una nova incidència</h1>

  <form action='{{ route('tickets.store') }}' method='POST'>

      @csrf
          <tr><td>Tipus:</td><br>
            <td><input type="text" name="type"></td>
          </tr>
          <br>
          <div class="row">
              <div></div>
          </div>
          <tr><td>Tema:</td><br>
            <td><input type="text" name="topic"></td>
          </tr>
          <br>
          <tr><td>Prioritat:</td><br>
            <td><input type="text" name="priority"></td>
          </tr>
          <br>
          <tr><td>Responsable assignat:</td><br>
            <td><input type="text" name="assigned"></td>
          </tr>
          <br>
          <input name='crear' value='Crear' type='submit'/>
      </form> --}}

    <div class="content formulari closed">

      <form action='{{ route('tickets.store') }}' method='POST' class="was-validated" autocomplete="off">
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
                                  <h1>Crea una nova incidència</h1>
                              </div>
                          </div>
                      </div>

                      <!-- Input básico -->
                      <div class="form-group mt-4">
                          <div class="row justify-content-center">
                              <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                  <label for="exampleFormControlInput1">Tipus:</label>
                                  <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Titol..." name="type" required>

                              </div>
                          </div>
                      </div>
                      <!-- fin input básico -->

                      <!-- Input básico -->
                      <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <label for="exampleFormControlInput1">Tema:</label>
                                <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Descripció..." name="topic" required>

                            </div>
                        </div>
                    </div>
                    <!-- fin input básico -->

                    <!-- Input básico -->
                    <div class="form-group mt-4">
                      <div class="row justify-content-center">
                          <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                              <label for="exampleFormControlInput1">Prioritat:</label>
                              <select class="form-control" id="exampleFormControlInput1" name="priority" required>
                                <option value="">-- Sel·lecionar prioritat --</option>
                                <option value="low">Baixa</option>
                                <option value="medium">Mitjana</option>
                                <option value="high">Alta</option>
                              </select>
                          </div>
                      </div>
                  </div>
                  <!-- fin input básico -->

                  <!-- Input básico -->
                  <!-- <div class="form-group mt-4">
                      <div class="row justify-content-center">
                          <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                              <label for="exampleFormControlInput1">Responsable assignat:</label>
                              <select class="form-control" id="exampleFormControlInput1" name="assigned" required>
                                <option value="">-- Sel·lecionar usuari --</option>
                              @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</option>
                              @endforeach
                              </select>
                          </div>
                      </div>
                  </div> -->
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
