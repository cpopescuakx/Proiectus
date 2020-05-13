@extends('layouts.default')
@inject('controller', 'App\Http\Controllers\UserController')
@inject('userProject', 'App\Http\Controllers\User_projectController')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="column mt-4 mb-4">
                <h1 class="display-4">{{$project->name}}</h1>
            </div>
        </div>
    </div>

    {{-- A la ID del botó afegir el nom de la ID del div + "-tab"
         A la funció tabs() passar-li l'event i el nom de la ID del div --}}

    <div class="row justify-content-center">
        <div class="tab">
            <button id = "info-tab" class="mr-1 tablinks" onclick="tabs(event, 'info')"><i data-toggle="tooltip" title="Informació" class="boto btn fa fa-info fa-lg"></i></button>
            @if(Auth::check())
              @if($userProject->memberOf($id_project) || Auth::user()->id_role == 1 || Auth::user()->id_role == 5)
              <button id = "gest-tab" class="mr-1 tablinks" onclick="tabs(event, 'gest')"><i data-toggle="tooltip" title="Gestor documental" class="boto btn fas fa-folder-open fa-lg"></i></button>
              <button id = "res-tab" class="mr-1 tablinks" onclick="tabs(event, 'res')"><i data-toggle="tooltip" title="Centre de recursos" class="boto btn fas fa-file fa-lg"></i></button>
              <button id = "wiki-tab" class="mr-1 tablinks" onclick="tabs(event, 'wiki')"><i data-toggle="tooltip" title="Wikipedia" class="boto btn fab fa-wikipedia-w fa-lg"></i></button>
              <button id = "blog-tab" class="mr-1 tablinks" onclick="tabs(event, 'blog')"><i data-toggle="tooltip" title="Blog" class="boto btn fa fa-rss fa-lg"></i></button>
              <button id = "participants-tab" class="mr-1 tablinks" onclick="tabs(event, 'participants')"><i data-toggle="tooltip" title="Participants" class="boto btn fa fa-users fa-lg"></i></button>
              <button id = "xat-tab" class="mr-1 tablinks" onclick="tabs(event, 'xat')"><i id = "btn-xat" data-toggle="tooltip" title="Xat" class="boto btn fas fa-comments fa-lg"></i></button>
              @endif
            @endif
        </div>
    </div>

    <div class="row justify-content-center">
        <div id="info" class="tabcontent mt-3">

            <div class="row justify-content-center mb-3">
                <h2 class="mt-3"><strong>Informació</strong></h2>
                <a style="color: #007bff" onclick="AJAXJSPur();"><i style="font-size: 1.3rem" class="fas fa-sync" alt="Icona per a modificar"></i></a>
                {{-- <a style="color: #007bff" onclick="AJAXjQuery();"><i style="font-size: 1.3rem" class="fas fa-sync" alt="Icona per a modificar"></i></a> --}}
                {{-- <a style="color: #007bff" onclick="AJAXJSFetch();"><i style="font-size: 1.3rem" class="fas fa-sync" alt="Icona per a modificar"></i></a> --}}

            </div>
            <div class="row">
                <p class="desc"><i style="width: 50px;" class="fas fa-angle-right fa-lg pl-2"></i>Descripció: {{$project->description}}</p>
            </div>

            <div class="row">
                <p class="fam"><i style="width: 50px;" class="fas fa-angle-right fa-lg pl-2"></i>Família: {{$project->professional_family}}</p>
            </div>

            <div class="row">
                <p class="ending"><i style="width: 50px;" class="fas fa-clock fa-lg"></i>Data límit: {{$project->ending_date}}</p>
            </div>

            <div class="row">
                <p class="budget"><i style="width: 50px;" class="fas fa-money-bill-wave fa-lg"></i>Pressupost: {{$project->budget}} €</p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div id="gest" class="tabcontent mt-3">
            <h2 class="mt-3"><strong>Gestor documental</strong></h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div id="res" class="tabcontent mt-3 w-75">
            <h2 class="mt-3 text-center"><strong>Centre de recursos compartits</strong></h2>
            @include('resourceCenter.upload')
    </div>

    <div class="row justify-content-center">
        <div class="col">
            <div id="wiki" class="tabcontent mt-3">
                @include('Wiki.index')
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col">
            <div id="blog" class="tabcontent mt-3">
                @include('Blog.index')
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div id="participants" class="tabcontent mt-3">

            <h2 class="mt-3 mb-3"><strong>Participants</strong></h2>
            <div class="container">
                @foreach ($participants as $participant)
                    @php
                        $user = $controller->getUser($participant->id_user)
                    @endphp
                    <p><i class="fas fa-user fa-lg mr-3"></i> {{$user->firstname.' '.$user->lastname}}</p>
                @endforeach
            </div>
            @if(Auth::check())
                @if($userProject->memberOf($id_project) && (Auth::user()->id_role == 4 || Auth::user()->id_role == 5) || Auth::user()->id_role == 1)
                    <div class="row justify-content-center">
                        <div class="col-12 p-0">
                            <div class="card">
                                <div class="card-header">
                                    Invita usuaris
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="post" action="{{ route('projects.invite', $id_project) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="emails">Es poden invitar a més d'un separant amb una coma.</label>
                                            <input type="text" class="form-control" id="emails" name="emails" aria-describedby="emailHelp" placeholder="Entra Email">
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>

    <div class="row justify-content-center">
        <div id="xat" class="tabcontent mt-3">
            <h2 class="mt-3"><strong>Xat</strong></h2>
            <div id="app">
                <create-chat :initial-users="{{ $users }}" :project="{{ $project->id_project }}"></create-chat>
                <chats :initial-chats="{{ $chats }}" :user="{{ auth()->user() }}" :project="{{ $project->id_project }}"></chats>
            </div>
        </div>
    </div>
</div>


    <script>

        /** Al carregar la pàgina comprova si existeix la cookie que gurda l'última tab,
            si existeix, activa el botó i mostra l'apartat que guardat. En cas contrari,
            mostra la primera tab (apartat d'informació) */

        if (localStorage.last) {
            document.getElementById(localStorage.last).style.display = "block";
            document.getElementById(localStorage.last + "-tab").className += " active";
        }

        else {
            document.getElementById('info').style.display="block";
        }

        /** Funció que s'activa al fer click a un botó de les tabs, mostra l'apartat que s'ha fet
            click i activa el botó. Per acabar, guarda al localStorage la tab clickada (Per a que
            ho recordi quan es refresca la pàgina). */

        function tabs(evt, apartat) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            document.getElementById(apartat).style.display = "block";
            evt.currentTarget.className += " active";
            localStorage.last = apartat;
        }
    </script>
    <script src="{{asset('js/AJAXAndrei.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @section('custom-scripts')
        <script>
            $('#summernoteBlog').summernote({
                placeholder: 'Contingut',
                tabsize: 2,
                height: 100,
                minHeight: 100,
                maxHeight: 400
            });

            /* Comprovem si el contingut del post esta buit al fer submit i
                evitem continuar si està buit
            */
            $('#postCreationForm').on('submit', function(e) {
                // Comprovem si el contingut del post esta buit
                if ($('#summernoteBlog').summernote('isEmpty')) {
                    console.log('Introdueix el contingut del post!');
                    // Evitar el submit
                    e.preventDefault();
                }
            });
            $('#summernoteWiki').summernote({
                placeholder: 'Contingut',
                tabsize: 2,
                height: 100,
                minHeight: 100,
                maxHeight: 400
            });


            /* Comprovem si el contingut del post esta buit al fer submit i
                evitem continuar si està buit
            */
            $('#articleCreationForm').on('submit', function(e) {
                // Comprovem si el contingut del post esta buit
                if ($('#summernoteWiki').summernote('isEmpty')) {
                    console.log('Introdueix el contingut del article!');
                    // Evitar el submit
                    e.preventDefault();
                }
            })

        </script>
    @endsection
@endsection
