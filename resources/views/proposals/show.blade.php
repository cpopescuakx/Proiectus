@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="column">
                <h1>{{$proposal->name}}</h1>
                <h5>{{$proposal->description}}</h5>
            </div>
        </div>
    </div>
@stop