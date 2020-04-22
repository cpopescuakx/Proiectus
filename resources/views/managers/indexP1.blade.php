@extends('layouts.default')
@inject('city', 'App\Http\Controllers\CityController') {{-- Importa el controlador de ciutat --}}

@section('content')

<div class="container-fluid">
    <div class="row text-center">
  		<div class="col-sm-10 ml-5 mt-5 mx-auto">
              <h1>Hola, {{ Auth::user()->firstname }}</h1>
        </div>
    </div>
    <div class="row">
  		<div class="col-sm-4 mx-auto"><!--left col-->
            <div class="text-center">
                <!-- Muestra una imagen por defecto si el usuario no ha subido ninguna foto de perfil -->
                @if(Auth::user()->profile_pic == null)
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">

                <!-- Muestra la imagen que ha seleccionado el usuario -->
                @else 
                <img src="{{ Auth::user()->profile_pic }}" class="avatar img-circle img-thumbnail" alt="avatar">
                @endif
                <h6>Puja la teua imatge de perfil</h6>

                <!-- NO FUNCIONA: REGALO PARA EL GRUPO1 DEL SPRINT6 -->
                <input type="file" class="text-center mx-auto file-upload">
            </div>
            <br>
        </div><!--/col-4-->
    </div><!--/row-->

    <div class="row">
        <!-- Datos perfil de usuario -->
    	<div class="col-sm-9 mx-auto">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Informació Personal
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nom: {{ Auth::user()->firstname }}</li>

                    <li class="list-group-item">Cognom: {{ Auth::user()->lastname }}</li>

                    <li class="list-group-item">Email: {{ Auth::user()->email }}</li>

                    <li class="list-group-item">Població: {{ $city::agafarNom(Auth::user()->id_city) }}</li>
                        
                    <li class="list-group-item">DNI: {{ Str::upper(Auth::user()->dni) }}</li>
                        
                    <li class="list-group-item">Estat del compte: {{ Auth::user()->status }}</li>
                </ul>
            </div>
        </div><!--/col-8-->
    </div><!--/row-->
    <br>

    @if(Auth::user()->id_role == '5')
    <!-- Sección para subir logo de la empresa/instituto (SOLO VISIBLE POR GESTORES) -->
    <div class="row">
    	<div class="col-sm-9 mx-auto">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Logo de l'empresa/institut
                </div>
                <div class="text-center my-2">
                    <!-- Muestra una imagen por defecto si el usuario no ha subido ninguna foto de perfil -->
                    @if(Auth::user()->profile_pic == null)
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_1x.png" class="avatar img-circle img-thumbnail" alt="avatar">
    
                    <!-- Muestra la imagen que ha seleccionado el usuario -->
                    @else 
                    <img src="{{ Auth::user()->logo_eentity }}" class="avatar img-circle img-thumbnail" alt="avatar">
                    @endif
                    <h6>Puja el logo de la teva empresa o institut</h6>
    
                    <!-- NO FUNCIONA: REGALO PARA EL GRUPO1 DEL SPRINT6 -->
                    <input type="file" class="text-center mx-auto file-upload">
                </div>
            </div>
        </div><!--/col-8-->
    </div><!--/row-->
    @endif

    <div class="col-sm-9 mx-auto">
        <div class="row mt-5">
            @if(Auth::user()->status == "active")
            <div class="col-sm-6">
                <div class="card text-center text-dark">
                    <div class="card-header font-weight-bold">
                        Desactivar compte temporalment
                    </div>
                    <div class="card-body">
                    <p class="card-text">Si vols, tens l'opció de desactivar el teu compte temporalment. Si vols eliminar-la definitivament, comunica'ns-ho.</p>
                    <a href="{{ route('managers.destroyP', [Auth::user()->id]) }}" class="btn btn-danger">Desactivar</a>
                    </div>
                </div>
            </div>
            @else
            <div class="col-sm-6">
                <div class="card text-center text-dark">
                    <div class="card-header font-weight-bold">
                        Activar compte d'usuari
                    </div>
                    <div class="card-body">
                    <p class="card-text">El teu compte està inactiu. Si vols, pots activar-la de nou. Per a això, fes clic en el botó.</p>
                    <a href="{{ route('managers.activeP', [Auth::user()->id]) }}" class="btn btn-success">Activar</a>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-sm-6">
                <div class="card text-center text-dark">
                    <div class="card-header font-weight-bold">
                        Editar perfil d'usuari
                    </div>
                    <div class="card-body">
                    <p class="card-text">Si vols editar el teu perfil per a canviar qualsevol de les teves dades personals. Fes clic al botó.</p>
                    <a href="{{ route('managers.editP', [Auth::user()->id]) }}" class="btn btn-dark">Editar</a>
                    </div>
                </div>
            </div>
        </div><!-- /row -->
    </div>

<!-- JS FOTO PERFIL - NO FUNCIONA (REGALO PARA EL GRUPO1 DEL SPRINT 6) -->
<script>
$(document).ready(function() {

    
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.avatar').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(".file-upload").on('change', function(){
    readURL(this);
});
});
</script>
@endsection
