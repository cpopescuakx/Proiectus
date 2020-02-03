@extends('layouts.default')

@section('content');
<body id="body">
    <div class="content formulari closed">

        <form class="was-validated" action='{{ route('projects.store') }}' method='POST'>
            <!-- inicio formulario -->
            <div class="row justify-content-center">

                <!-- grid container formulario-->
                <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-10">

                    <!-- Imagen formulario -->
                    <div class="container">
                        <div class="contact-image text-center mt-3">
                            <img class="form-img" src="img/icono_negro.png" />
                        </div>
                    </div>

                    <!-- container formulario -->
                    <div class="container contact-form">


                        <div class="container">
                            <div class="row no-gutters justify-content-center mt-5">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <h1>Proiectus forms.</h1>
                                    <p>Estás en la plantilla proiectus forms, toma lo que sea útil para tu formulario, aplícalo bien, haz tu trabajo.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Input básico -->
                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="exampleFormControlInput1">Tipo de información</label>
                                    <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Ejemplo del tipo de información" required>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>

                                </div>
                            </div>
                        </div>
                        <!-- fin input básico -->
                        <!-- Input básico -->
                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="exampleFormControlInput1">Tipo de información</label>
                                    <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Ejemplo del tipo de información" required>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>

                                </div>
                            </div>
                        </div>
                        <!-- fin input básico -->
                        <!-- Input básico -->
                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="exampleFormControlInput1">Tipo de información</label>
                                    <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Ejemplo del tipo de información" required>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>

                                </div>
                            </div>
                        </div>
                        <!-- fin input básico -->
                        <!-- Input básico -->
                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="exampleFormControlInput1">Tipo de información</label>
                                    <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Ejemplo del tipo de información" required>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>

                                </div>
                            </div>
                        </div>
                        <!-- fin input básico -->

                    </div>
                    <!-- fin container formulario -->

                </div>
                <!--  fin grid container formulario-->

            </div>
            <!-- fin formulario -->
        </form>

    </div>

    <script src="js/header.js"></script>

</body>
@stop
{{-- <body>
    <h1>Crear un nou projecte</h1>

<form action='{{ route('projects.store') }}' method='POST'>
    @csrf
        <tr><td>Nom del Projecte:</td><br>
          <td><input type="text" name="name"></td>
        </tr>
        <br>
        <div class="row">
            <div></div>
        </div>
        <tr><td>Pressupost:</td><br>
          <td><input type="text" name="pro_family"></td>
        </tr>
        <br>
        <tr><td>Descripció :</td><br>
          <td><input type="text" name="desc"></td>
        </tr>
        <br>
        <tr><td>Familia Professional:</td><br>
          <td><input type="text" name="budget"></td>
        </tr>
        <br>
        <input name='crear' value='Crear' type='submit'/>
    </form>
</body> --}}

