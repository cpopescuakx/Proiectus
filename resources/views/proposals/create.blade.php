@extends('layouts.default')

@section('content')
<body>
    <div class="formulari">

      <form action='{{ route('proposals.store') }}' method='POST' class="was-validated" >
        @csrf
          <!-- inicio formulario -->
          <div class="row justify-content-center">

              <!-- grid container formulario-->
              <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-10">

                  <!-- Imagen formulario -->
                  <div class="container">
                      <div class="contact-image text-center mt-3">
                          <img class="form-img" src="{{ asset('img/icono_negro.png') }}"  />
                      </div>
                  </div>

                  <!-- container formulario -->
                  <div class="container contact-form">


                      <div class="container">
                          <div class="row no-gutters justify-content-center mt-5">
                              <div class="text-center col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                  <h1>Crea una proposta nova</h1>
                              </div>
                          </div>
                      </div>

                      <!-- Input básico -->
                      <div class="form-group mt-4">
                          <div class="row justify-content-center">
                              <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                  <label class="font-weight-bold" for="nom">Nom de la proposta</label>
                                  <input type="name" class="form-control" id="exampleFormControlInput1" name="name" required>

                              </div>
                          </div>
                      </div>
                      <!-- fin input básico -->


                    <!-- Input básico -->
                    <div class="form-group mt-4">
                      <div class="row justify-content-center">
                          <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                              <label class="font-weight-bold" for="data">Data de finalització</label>
                              <input type="date" class="form-control" id="exampleFormControlInput1" name="limit_date" required>

                          </div>
                      </div>
                  </div>
                  <!-- fin input básico -->

                  <!-- Input básico -->
                  <div class="form-group mt-4">
                    <div class="row justify-content-center">
                        <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                            <label class="font-weight-bold" for="descripcio">Descripció</label>
                            <textarea type="text" class="form-control" id="exampleFormControlInput1" name="description" required></textarea>

                        </div>
                    </div>
                </div>
                <!-- fin input básico -->

              <!-- Input básico -->
              <div class="form-group mt-4">
                <div class="row justify-content-center">
                    <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                        <label class="font-weight-bold" for="familia">Familia Professional</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="professional_family" required>
                    </div>
                </div>
              </div>
              <!-- fin input básico -->

              <!-- Input básico -->
              <div class="form-group mt-4">
                <div class="row justify-content-center">
                    <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                        <label class="font-weight-bold" for="entitat">Entitat</label>
                        <select class="form-control" id="exampleFormControlInput1" name="category" required>
                            <option></option>
                            <option value="school">Institut</option>
                            <option value="company">Empresa</option>
                        </select>
                    </div>
                </div>
              </div>
              <!-- fin input básico -->


              <div class="form-group mt-4">
                <div class="row justify-content-center">
                    <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                        <label class="font-weight-bold" for="tags">Tags</label>
                            <select class="form-control"
                                    data-style="btn-white"
                                    title="Escull les tags"
                                    name="tags[]"
                                    multiple>
                                @foreach($tags as $tag)
                                    <option data-tokens="{{$tag->id_tag}}" value="{{$tag->id_tag}}">{{$tag->tag_name}}</option>
                                @endforeach
                            </select>
                        <div class="invalid-feedback">Camp necessari</div>
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
      </form>
    </div>
</body>
@endsection


