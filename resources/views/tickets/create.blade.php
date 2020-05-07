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

    @if (Auth::guest())
    <div class="text-center row justify-content-md-center">
        <div class="alert alert-danger mt-4 w-50" role="alert">
            <i class="fas fa-exclamation-circle fa-2x mr-3"></i>
            <h4 class="d-inline">Has d'<a href="{{ route ('login') }}">iniciar sessió</a>!</h4>
        </div>
    </div>
    @else

    <div class="formulari">
      <form action='{{ route('tickets.store', ['id_author'=>Auth::user()->id]) }}' method='POST' class="was-validated" autocomplete="off">
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
                                  <label for="exampleFormControlInput1"><strong>Assumpte</strong></label>
                                  <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Titol..." name="type" required>

                              </div>
                          </div>
                      </div>
                      <!-- fin input básico -->

                      <!-- Input básico -->
                      <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <label for="exampleFormControlInput1"><strong>Descripció</strong></label>
                                <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Descripció..." name="topic" required>

                            </div>
                        </div>
                    </div>
                    <!-- fin input básico -->

                    <!-- Input básico -->
                    <div class="form-group mt-4">
                      <div class="row justify-content-center">
                          <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                              <label for="exampleFormControlInput1"><strong>Prioritat</strong></label>
                              <select class="form-control" id="exampleFormControlInput1" name="priority" required>
                                <option value="">-- Seleccionar prioritat --</option>
                                <option value="low">Baixa</option>
                                <option value="medium">Mitjana</option>
                                <option value="high">Alta</option>
                              </select>
                          </div>
                      </div>
                  </div>

                <div class="form-group mt-4">
                    <div class="row justify-content-center">
                        <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                            <label for="exampleFormControlInput1"><strong>Responsable assignat</strong></label>
                            <select name="assigned" class="selectpicker form-control mt-2" data-live-search="true" title="Escull un usuari" required>
                                @foreach($users as $user)
                                    <option data-tokens="{{$user->id}}" value="{{$user->id}}">{{$user->firstname. ' '. $user->lastname. ' ('.$user->username.')'}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>



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
        </div>
      </form>
      @endif

</body>
@stop
