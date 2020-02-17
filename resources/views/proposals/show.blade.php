@extends('layouts.default')

@section('content')
  
    <link rel="stylesheet" type="text/css" href="{{asset('css/components/g2/g2_style.css')}}">
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
@stop
