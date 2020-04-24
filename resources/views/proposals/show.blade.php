@extends('layouts.default')

@section('content')

    <div class="container pt-5">

        <!-- Encabezado con logo y título -->
        <div class="row p-5 shadow">
            <div class="col my-auto">
                @if(Auth::user()->logo_entity == 'null')
                    <img class="rounded-circle mr-auto img-thumbnail" alt="250x250" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" data-holder-rendered="true" />               
                @else
                    <img class="rounded-circle mr-auto w-50 img-thumbnail" alt="250x250" src="{{ Auth::user()->logo_entity }}" data-holder-rendered="true" />
                @endif
            </div>
            <div class="col my-auto">
                <h1 class="my-5">{{ $proposal->name }}</h1>
            </div>
        </div>
        <!-- /row -->
        <br>
        <!-- Espacio para tags -->
        <div class="row p-5 shadow">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Etiquetes
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">TO-DO: Hacer consulta para mostrar tags asociados a cada proyecto</li>
                </ul>
            </div>
            <!-- /card -->
        </div>
        <!-- /row -->
        <br>
        <!-- Características propuestas -->
        <div class="row p-5 shadow">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Característiques
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span class="font-weight-bold">Descripció:</span> {{ $proposal->description }}</li>
    
                        <li class="list-group-item"><span class="font-weight-bold">Professional Family:</span> {{ $proposal->professional_family }}</li>
    
                        <li class="list-group-item"><span class="font-weight-bold">Entitat:</span> {{ $proposal->category }}</li>
    
                        <li class="list-group-item"><span class="font-weight-bold">Data d'inici:</span> {{ date('d/m/Y', strtotime($proposal->created_at)) }}</li>
                            
                        <li class="list-group-item"><span class="font-weight-bold">Data de finaltzació:</span> {{ date('d/m/Y', strtotime($proposal->limit_date)) }}</li>
                    </ul>
                </div>
                <!-- /card -->
        </div>
        <!-- /row -->
        <br>
        <!-- Otras cosas xD -->
        <div class="row p-5 shadow">
            <div class="col my-auto">
            </div>
            <div class="col my-auto">
            </div>
            <div class="col my-auto">
                <p>TO-DO: Hacer funcionalidad que permita a una entidad distinta aceptar la propuesta </p>
                <a class="btn btn-dark text-white">APPLY</a>
            </div>
        </div>
        <!-- /row -->
    </div>


@endsection

