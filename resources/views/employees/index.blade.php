@extends('layouts.default')
@inject('city', 'App\Http\Controllers\CityController') {{-- Importa el controlador de ciutat --}}

@section('content')
<div class="col">
  <div class="row d-flex justify-content-between p-0 pb-4">
  <!-- Filtro -->
    <nav>
        <form class="form-inline">
            <h4 style="margin-right: 1rem">Llistat Empleats</h4>
            <select name="tipo" class="custom-select mr-2">
                <option value="" disabled selected hidden>Filtrar Empleats</option>
                <option value="active">Actius</option>
                <option value="inactive">Inactius</option>
              </select>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cercar</button>
        </form>
    </nav>
    <div class="d-flex">
        <a class="mr-3" href="{{ route('employee.create') }}"><img src={{ asset('public/img/add.svg') }} width="45" height="45" ></a>
        <a href="{{ route('employees.csv') }}"><i class="fas fa-file-csv" style="color: #116466; font-size: 45px;"></i></a>
    </div>
  </div>
</div>
<table class="table table-hover mr-5">
<thead>
    <tr>
        <td><strong>Nom</strong></td>
        <td><strong>Cognom</strong></td>
        <td><strong>Num d'usuari</strong></td>
        <td><strong>Email</strong></td>
        <td><strong>DNI</strong></td>
        <td><strong>Ciutat</strong></td>
        <td colspan="2"><strong>Accions</strong></td>
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
        <td>{{$employee->firstname}}</td>
        <td>{{$employee->lastname}}</td>
        <td>{{$employee->username}}</td>
        <td>{{$employee->email}}</td>
        <td>{{$employee->dni}}</td>
        <td>{{$city::agafarNom($employee->id_city)}}
        <td>
            <a href="{{ route('employee.edit', [$employee->id]) }}"><img src={{ asset('public/img/edit.svg') }} width="20" height="20" class="mr-2"></a>
            @if($employee->status == "active")
            <a href="{{ route('employee.destroy', [$employee->id]) }}"><img src={{ asset('public/img/delete.svg') }} width="20" height="20"></a>
            @else
                <a href="{{ route('employee.active', [$employee->id]) }}"><img src={{ asset('public/img/checkIcon.svg') }} width="20" height="40" class="mr-2"></a>
            @endif

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
<div class="d-flex pt-5 justify-content-center">
    <div class="inline-block">{{ $employees->links() }}</div>
</div>
</div>
@stop
