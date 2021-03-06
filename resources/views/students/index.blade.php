@extends('layouts.default')
@inject('city', 'App\Http\Controllers\CityController') {{-- Importa el controlador de ciutat --}}
@inject('school_users', 'App\Http\Controllers\School_usersController')

@section('content')

<div class="col">
    <div class="row d-flex justify-content-end p-4">
      <a href="{{ route('students.create') }}" class="mr-4"><img src={{ asset('img/add.svg') }}  width="45" height="45" ></a>
      <a href="{{ route('students.import') }}"><i class="fas fa-file-csv" style="color: #116466; font-size: 45px;"></i></a>
    </div>
    
</div>
<!--
<table class="table table-sm"
       data-toggle="table"
       data-filter-control="true"
       data-sortable="true"
       data-pagination="true"
       data-search="true">

    <thead>
    <tr>
        <th data-visible="false">ID</th>
        <th data-sortable="true" data-filter-control="input">NOMBRE</th>
        <th data-sortable="true">DOMICILIO</th>
        <th data-sortable="true" data-filter-control="select">POBLACIÓN</th>
        <th data-sortable="true" data-filter-control="select">PROVINCIA</th>
        <th data-sortable="true" data-filter-control="select">PAÍS</th>
        <th data-sortable="true">NIF</th>
        <th data-sortable="true">TELÉFONO</th>
        <th data-sortable="true">EMAIL</th>
        <th data-sortable="true" data-visible="false">FECHA ALTA</th>
        <th>OPCIONES</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>adw</td>
        <td>jea5h</td>
        <td>hrea</td>
        <td>reh</td>
        <td>rhe</td>
        <td>erha</td>
        <td>hrea</td>
        <td>aher</td>
        <td>arhe</td>
        <td>haer</td>
        <td>az</td>
    </tr>
    </tbody>
</table>
-->
<div class="table-responsive">
    <h4 style="margin-right: 1rem">Administració d'Alumnes </h4>

    <table class="table table-sm table-hover shadow-sm">
    <thead>
        <tr>
            <th data-field="nom">Nom</th>
            <th data-field="cognom">Cognom</th>
            <th data-field="usuari">Usuari</th>
            <th data-field="email">Email</th>
            <th data-field="dni">DNI</th>
            <th data-field="ciutat">Ciutat</th>
            <th data-field="ciutat">Centre</th>
            <th data-field="estat">Estat</th>
            <th data-field="accions" colspan="2">Accions</th>
        </tr>
    </thead>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{$student->firstname}}</td>
                <td>{{$student->lastname}}</td>
                <td>{{$student->username}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->dni}}</td>
                <td>{{$city::agafarNom($student->id_city)}}</td>
                <td>
                    @if(!is_object($school_users::getUsersSchoolName($student->id)))
                    {{($school_users::getUsersSchoolName($student->id))}}
                        @else
                        {{($school_users::getUsersSchoolName($student->id))->name}}
                    @endif
                </td>
                 @if($student->status == "active")
                    <td><span class="badge badge-success">ACTIU</span></td>
                @elseif($student->status == "inactive")
                    <td><span class="badge badge-danger">INACTIU</span></td>
                    @endif

                <td>
                    <a href="{{ route('students.edit', [$student->id]) }}"><img src={{ asset('img/edit.svg') }} width="20" height="20" class="mr-2"></a>
                    @if($student->status == "active")
                        <a href="{{ route('students.destroy', [$student->id]) }}"><img src={{ asset('img/delete.svg') }} width="20" height="20"></a>
                    @endif
                    @if($student->status == "inactive")
                        <a href="{{ route('students.enable', [$student->id]) }}"><img src={{ asset('img/checkIcon.svg') }} width="20" height="20"></a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
