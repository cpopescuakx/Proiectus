@extends('layouts.default')

@section('content')
@inject('schoolUser', 'App\Http\Controllers\School_usersController')
@inject('companyUser', 'App\Http\Controllers\Company_userController')


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
                <div class="card col-sm">
                    <div class="card-header font-weight-bold">
                        Característiques
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span class="font-weight-bold">Descripció:</span> {{ $proposal->description }}</li>
    
                        <li class="list-group-item"><span class="font-weight-bold">Professional Family:</span> {{ $proposal->professional_family }}</li>
    
                        <li class="list-group-item"><span class="font-weight-bold">Entitat:</span> {{ $proposal->category }}</li>
    
                        <li class="list-group-item"><span class="font-weight-bold">Data d'inici:</span> {{ date('d/m/Y', strtotime($proposal->created_at)) }}</li>
                            
                        <li class="list-group-item"><span class="font-weight-bold">Data de finalització:</span> {{ date('d/m/Y', strtotime($proposal->limit_date)) }}</li>
                    </ul>
                </div>
                <!-- /card -->
                <div id="app" class="col-sm">
                    <tips></tips>
                </div>
        </div>
        <!-- /row -->
        <br>
        
        @if ($proposal->category == 'school')
            @if (!$schoolUser::checkUser(Auth::user()->id)) 

                <div class="row p-5 shadow">
                    <div class="col my-auto">
                    </div>

                    <div class="col my-auto">
                    </div>

                    <div class="col my-auto">
                        <a data-toggle="modal" class="btn btn-dark text-white" data-target="#afegir">Afegir-se</a>
                    </div>
                </div>
            @endif
        @else
            @if(!$companyUser::checkUser(Auth::user()->id))
                <div class="row p-5 shadow">
                    <div class="col my-auto">
                    </div>

                    <div class="col my-auto">
                    </div>

                    <div class="col my-auto">
                        <a data-toggle="modal" class="btn btn-dark text-white" data-target="#afegir">Afegir-se</a>
                    </div>
                </div>

                
            @endif
        @endif
        
        <!-- /row -->
    </div>

    <div class="modal fade" id="afegir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Afegir-se a un projecte</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Estàs a punt d'afegir-te a la proposta, a l'acceptar es crearà el projecte.</p>
                    <p>Vols continuar?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" name="cancel" class="btn btn-danger" data-dismiss="modal">Cancel·la</button>
                    <a type="button" class="btn btn-success" name="delete" href="{{ route('proposals.convert', [$proposal->id_author, Auth::user()->id, $proposal->id_proposal]) }}">Acceptar</a>
                </div>
            </div>
        </div>
    </div>


@endsection

