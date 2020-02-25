@extends('layouts.default')

@section('content')
<div class="col">
    <div class="row d-flex justify-content-end p-4">
        <a href="{{ route('schools.create') }}"><img src={{ asset('img/add.svg') }} width="45" height="45"></a>
    </div>
</div>
<table class="table table-hover mr-5">
    <thead>
        <tr>
            <th>ID</th>
            <th>EMAIL</th>
            <th>NOM</th>
            <th>NIF</th>
            <th>SECTOR</th>
            <th>GESTOR</th>
            <td colspan="2">Accions</td>
        </tr>
    </thead>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif

    <tbody>
    </tbody>
</table>
@stop