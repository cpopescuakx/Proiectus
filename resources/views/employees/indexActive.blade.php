@extends('layouts.default')
@inject('city', 'App\Http\Controllers\CityController') {{-- Importa el controlador de ciutat --}}

@section('content')
<div class="col">
  <div class="row d-flex justify-content-end p-4">
    <a href="{{ route('employee.create') }}"><img src={{ asset('img/add.svg') }} width="45" height="45" ></a>
  </div>  
</div>
<table class="table table-hover mr-5">
<thead>
    <tr>
        <td>ID</td>
        <td>Nom</td>
        <td>Cognom</td>
        <td>Num d'usuari</td>
        <td>Email</td>
        <td>DNI</td>
        <td>Ciutat</td>
        <td colspan="2">Accions</td>
    </tr>
</thead>





@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
@endif



<tbody>
    @foreach($employees as $employee)
    <tr>
        <td>{{$employee->id}}</td>
        <td>{{$employee->firstname}}</td>
        <td>{{$employee->lastname}}</td>
        <td>{{$employee->name}}</td>
        <td>{{$employee->email}}</td>
        <td>{{$employee->dni}}</td>
        <td>{{$city::agafarNom($employee->id_city)}}
        <td>
            <a href="{{ route('employee.edit', [$employee->id]) }}"><img src={{ asset('img/edit.svg') }} width="20" height="20" class="mr-2"></a>
            <a href="{{ route('employee.destroy', [$employee->id]) }}"><img src={{ asset('img/delete.svg') }} width="20" height="20"></a>
        </td>

        {{-- <td><a href="{{ route('employee.edit', $project->id)}}" class="btn btn-primary">Editar</a></td> --}}
        {{-- <td>
            <form action="{{ route('employee.destroy', $project->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Esborrar</button>
            </form>
        </td> --}}

    </tr>
    @endforeach
</tbody>
</table>
@stop
