@extends('layouts.default')

@section('content')
    <div class="content formulari closed">
      <form class="was-validated" action="{{ route('proposals.update',[$proposal->id_proposal]) }}" method="POST">
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
                                    <h1>Modificar Proposta</h1>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="exampleFormControlInput1" name="id" value="{{$proposal->id_proposal}}" required>
                        <!-- Input básico -->
                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="exampleFormControlInput1">Nom de la proposta</label>
                                    <input type="name" class="form-control" id="exampleFormControlInput1" name="name" value="{{$proposal->name}}" required>

                                </div>
                            </div>
                        </div>
                        <!-- fin input básico -->


                      <!-- Input básico -->
                      <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <label for="exampleFormControlInput1">Data de finalització</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="limit_date" value="{{$proposal->limit_date}}" required>

                            </div>
                        </div>
                    </div>
                    <!-- fin input básico -->

                    <!-- Input básico -->
                    <div class="form-group mt-4">
                      <div class="row justify-content-center">
                          <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                              <label for="exampleFormControlInput1">Descripció</label>
                              <input type="text" class="form-control" id="exampleFormControlInput1" name="description" value="{{$proposal->description}}" required>

                          </div>
                      </div>
                  </div>
                  <!-- fin input básico -->

                <!-- Input básico -->
                <div class="form-group mt-4">
                  <div class="row justify-content-center">
                      <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                          <label for="exampleFormControlInput1">Familia Professional</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" name="professional_family" value="{{$proposal->professional_family}}" required>
                      </div>
                  </div>
                </div>
                <!-- fin input básico -->

                <!-- Input básico -->
                <div class="form-group mt-4">
                    <div class="row justify-content-center">
                        <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                            <label for="exampleFormControlInput1">Categoria</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="category" value="{{$proposal->category}}" required>
                        </div>
                    </div>
                  </div>
                  <!-- fin input básico -->


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
