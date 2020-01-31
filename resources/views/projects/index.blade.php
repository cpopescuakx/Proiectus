@extends('projects.layout')

@section('content')
<table class="table table-striped">
<thead>
    <tr>
        <td>ID</td>
        <td>Nom</td>
        <td>Data d'inici</td>
        <td>Data de finalització</td>
        <td>Pressupost</td>
        <td>Familia professional</td>
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
    @foreach($projects as $project)
    <tr>
        <td>{{ ++$i }}</td>

        <td>{{$project->id_project}}</td>
        <td>{{$project->name}}</td>
        <td>{{$project->initial_date}}</td>
        <td>{{$project->ending_date}}</td>
        <td>{{$project->budget}}</td>
        <td>{{$project->professional_family}}</td>
        <td>{{$project->status}}</td>
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
