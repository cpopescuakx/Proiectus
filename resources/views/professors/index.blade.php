@extends('layouts.default')

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
        <td>{{$professor->status}}</td>
        {{-- <td><a href="{{ route('professors.edit', $professor->id)}}" class="btn btn-primary">Editar</a></td> --}}
        {{-- <td>
            <form action="{{ route('professors.destroy', $professor->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Esborrar</button>
            </form>
        </td> --}}
    </tr>
    @endforeach
</tbody>
</table>
@endsection
