@extends('layouts.default')
@inject('city', 'App\Http\Controllers\CityController') {{-- Importa el controlador de ciutat --}}

@section('content')

<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<br><br>
<div class="container-fluid well span12">
	<div class="row-fluid">
        <div class="span2" >
		    <img src="data:image/png;base64,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" class="img-circle">
        </div>
        @foreach($managers as $manager)                
        <div class="span8">
            <h3>{{$manager->username}}</h3>
            <h6>Nom: {{$manager->firstname}}</h6>
            <h6>Cognom: {{$manager->lastname}}</h6>
            <h6>Email: {{$manager->email}}</h6>
            <h6>Localitat: {{$city::agafarNom($manager->id_city)}}</h6>
            <h6>DNI: {{$manager->dni}}</h6>
        </div>
        @endforeach
        
        <div class="span2">
            <div class="btn-group dropdown">
                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#"> Accions
                    <span class="icon-cog icon-white"></span></a>
                <ul class="dropdown-menu">                        
                    <li><a href="{{ route('managers.editP', [$manager->id]) }}"><i class="tiny material-icons">edit</i>Edita el perfil</a></li>
                    <li><a href="{{ route('managers.destroy', [$manager->id]) }}"><i class="tiny material-icons">delete</i>Dona't de baixa</a></li>
                </ul>
            </div>
        </div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection
