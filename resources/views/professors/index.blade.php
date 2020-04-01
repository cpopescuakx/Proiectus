@extends('layouts.default')
@inject('city', 'App\Http\Controllers\CityController') {{-- Importa el controlador de ciutat --}}

@section('content')
<div class="col">
  <div class="row d-flex justify-content-end p-4">
    <a href="{{ route('professors.create') }}"><img src={{ asset('img/add.svg') }} width="45" height="45" ></a>
  </div>
</div>
<table class="table table-hover mr-5">
<thead>
    <tr>
        <td>Nom</td>
        <td>Cognom</td>
        <td>Usuari</td>
        <td>DNI</td>
        <td>Ciutat</td>
        <td>Email</td>
        <td>Estat</td>
        <td colspan="2">Accions</td>
    </tr>
</thead>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
@endif

<tbody>
    @foreach($professors as $professor)
    <tr>
        <td>{{$professor->firstname}}</td>
        <td>{{$professor->lastname}}</td>
        <td>{{$professor->name}}</td>
        <td>{{$professor->email}}</td>
        <td>{{$professor->dni}}</td>
        <td>{{$city::agafarNom($professor->id_city)}}</td>
        <td>{{$professor->status}}</td>
        <td>
            <a href="{{ route('professors.edit', [$professor->id]) }}"><img src={{ asset('img/edit.svg') }} width="20" height="20" class="mr-2"></a>
            @if($professor->status == "active")
                <a href="{{ route('professors.destroy', [$professor->id]) }}"><img src={{ asset('img/delete.svg') }} width="20" height="20"></a>
            @endif
        </td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection
