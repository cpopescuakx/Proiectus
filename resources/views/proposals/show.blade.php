    @extends('layouts.default')

    @section('custom-css')
        <link rel="stylesheet" type="text/css" href="{{asset('css/components/g2/g2_style.css')}}">
    @endsection

    @section('content')
    @inject('schoolUser', 'App\Http\Controllers\School_usersController')
    @inject('companyUser', 'App\Http\Controllers\Company_userController')

    <!-- Spinner -->
    <div class="d-flex flex-column justify-content-around align-items-center">
        <div id="spinner_pi" class="spinner-border text-dark text-center" role="status" style="width: 3rem; height: 3rem;">
            <span class="sr-only">Loading...</span>
        </div>
        <p id="spinner-text">Carregant...</p>
    </div>
    <!-- Contenido principal de la página de propuestas individuales -->
    <div id="app" style="display:none;">
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

        <!-- Apartado para aceptar propuesta -->
        
        @if ($proposal->category == 'school')
            @if ((Auth::user()->id_role == 5)&& !$schoolUser::checkUser(Auth::user()->id))

                <div class="row pl-2 d-flex flex-column">
                    <div class="container-fluid">
                        <div class="notice notice-success">
                            <strong><span class="text-center"><h4>UNIR-SE A LA PROPOSTA</h4></span></strong>
                            <div class="col my-auto text-center">
                                <p>Pots unir-te a aquesta proposta, al fer-ho, es crearà el projecte on podràs col·laborar amb aquesta entitat.</p>
                                <a data-toggle="modal" class="btn bg-primary1 text-white" data-target="#afegir">Unir-se</a>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        @else
            @if((Auth::user()->id_role == 5) && !$companyUser::checkUser(Auth::user()->id))
                <div class="row pl-2 d-flex flex-column">
                    <div class="container-fluid">
                        <div class="notice notice-success">
                            <strong><span class="text-center"><h4>UNIR-SE A LA PROPOSTA</h4></span></strong>
                            <div class="col my-auto text-center">
                                <p>Pots unir-te a aquesta proposta, al fer-ho, es crearà el projecte on podràs col·laborar amb aquesta entitat.</p>
                                <a data-toggle="modal" class="btn bg-primary1 text-white" data-target="#afegir">Unir-se</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif

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
                        <button type="button" name="cancel" class="btn btn-danger" data-dismiss="modal">Cancel·lar</button>
                        <a type="button" class="btn btn-success" name="delete" href="{{ route('proposals.convert', [$proposal->id_author, Auth::user()->id, $proposal->id_proposal]) }}">Acceptar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<!-- Script para cargar página tras spinner (1000) -->
@section('custom-scripts')
        <script src="{{asset('js/spinner.js')}}"></script>
@endsection
