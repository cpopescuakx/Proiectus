@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="column">
                <h1>{{$project->name}}</h1>
                <h5>{{$project->description}}</h5>
            </div>
        </div>
    </div>
@stop
