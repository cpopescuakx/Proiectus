    @extends('layouts.default')

    @section('content')
    @inject('schoolUser', 'App\Http\Controllers\School_usersController')
    @inject('companyUser', 'App\Http\Controllers\Company_userController')


    <div id="app">
        <!-- Componente que carga un encabezado con logo, título y algunos datos del autor/entidad -->
        <div class="row pl-2 d-flex flex-column">
            <prophead></prophead>
        </div>
        <!-- Componente que carga los tags -->
        <div class="row pl-2 d-flex flex-column">
            <simpletag></simpletag>
        </div>
        <!-- Componente que carga los detalles de la propuesta -->
        <div class="row pl-2 d-flex flex-column">
            <propdetails></propdetails>
        </div>
        <!-- Componente que carga algunos consejos útiles -->
        <div class="row pl-2 d-flex flex-column">
            <tips></tips>
        </div>
    </div>
    <br>
    <div>
        @if ($proposal->category == 'school')
            @if (!$schoolUser::checkUser(Auth::user()->id))
                <div class="row p-5 shadow">
                    <div class="col my-auto text-center">
                        <p class="">Pots unir-te a aquesta proposta, al fer-ho, es crearà el projecte on podràs col·laborar amb aquesta entitat.</p>
                        <a data-toggle="modal" class="btn btn-dark text-white" data-target="#afegir">Unir-se</a>
                    </div>
                </div>
            @endif
        @else
            @if(!$companyUser::checkUser(Auth::user()->id))
                <div class="row p-5 shadow">
                    <div class="col my-auto text-center">
                        <p class="">Pots unir-te a aquesta proposta, al fer-ho, es crearà el projecte on podràs col·laborar amb aquesta entitat.</p>
                        <a data-toggle="modal" class="btn btn-dark text-white" data-target="#afegir">Unir-se</a>
                    </div>
                </div>
            @endif
        @endif
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
