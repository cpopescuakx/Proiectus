@extends('projects.layout')

@section('content')
<table class="table table-striped">
    <a href="">Crear</a>
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
    @foreach($students as $student)
    <tr>
        <td>{{$student->firstname}}</td>
        <td>{{$student->lastname}}</td>
        <td>{{$student->name}}</td>
        <td>{{$student->email}}</td>
        <td>{{$student->status}}</td>
        {{-- <td><a href="{{ route('projects.edit', $project->id)}}" class="btn btn-primary">Editar</a></td> --}}
        {{-- <td>
            <form action="{{ route('projects.destroy', $project->id)}}" method="post">
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
