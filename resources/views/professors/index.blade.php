@extends('layouts.default')

@section('content')
<table class="table table-striped">
<a href="{{route('professors.create')}}">Crear</a>
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
