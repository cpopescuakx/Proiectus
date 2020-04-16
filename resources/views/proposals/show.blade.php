@extends('layouts.default')

@section('content')

    <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/components/g2/g2_style.css')}}"> -->
    <a style="color: #007bff" onclick="AJAXJSPur();">a<i style="font-size: 1.3rem" class="fas fa-sync" alt="Icona per a modificar"></i></a>
    <a style="color: #007bff" onclick="AJAXjQuery();">b<i style="font-size: 1.3rem" class="fas fa-sync" alt="Icona per a modificar"></i></a>
    <a style="color: #007bff" onclick="AJAXJSFetch();">v<i style="font-size: 1.3rem" class="fas fa-sync" alt="Icona per a modificar"></i></a>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="column mt-4 mb-4">
                <h1>Títol: {{$proposal->name}}</h1>
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="column mt-4 mb-4">
                <h3>Descripció: {{$proposal->description}}</h3>
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="column mt-4 mb-4">
                <h3>Familia professional: {{$proposal->professional_family}}</h3>
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="column mt-4 mb-4">
                <h3>Categoria: {{$proposal->category}}</h3>
            </div>
        </div>
    </div>
    <script src="{{asset('js/AJAXCezar.js')}}"></script>

@stop
