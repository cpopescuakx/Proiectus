@extends('layouts.default')

@section('content')

    <div class="container pt-5">

        <!-- Encabezado con logo y título -->
        <div class="row p-5 shadow">
            <div class="col my-auto">
                @if(Auth::user()->logo_entity == 'null')
                    <img class="rounded-circle mr-auto img-fluid img-thumbnail" alt="250x250" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" data-holder-rendered="true" max-width="50%" />
                @else 
            <img class="rounded-circle mr-auto" alt="250x250" src="{{ Auth::user()->logo_entity }}" data-holder-rendered="true" />
                @endif
            </div>
            <div class="col my-auto">
                <h1 class="my-5">{{ $proposal->name }}</h1>
            </div>
            <div class="col my-auto">
                <a class="btn btn-dark text-white">APPLY</a>
            </div>
        </div>
        <!-- /row -->
        <br>
        <!-- Espacio para tags -->
        <div class="row p-5 shadow">
            <div class="col my-auto">
                             
            </div>
            <div class="col my-auto">
                
            </div>
            <div class="col my-auto">
                
            </div>
        </div>
        <!-- /row -->
        <br>
        <!-- Características propuestas -->
        <div class="row p-5 shadow">
            <div class="col my-auto">
            </div>
            <div class="col my-auto">
            </div>
            <div class="col my-auto">
            </div>
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
            </div>
        </div>
        <!-- /row -->
    </div>


@endsection

<!--

{{$proposal->description}}
{{$proposal->professional_family}}
{{$proposal->category}}

-->