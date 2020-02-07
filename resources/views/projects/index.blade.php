@extends('layouts.default')

@section('content')
<div class="col">
  <div class="row">
    <a href="{{ route('projects.create') }}" class="btn btn-primary">Crear</a>
  </div>  
</div>
<table class="table table-hover mt-5 mr-5">
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

        {{--<td>{{$project->id_project}}</td>--}}
        <td>{{$project->name}}</td>
        <td>{{$project->created_at}}</td>
        <td>{{$project->ending_date}}</td>
        <td>{{$project->budget}}</td>
        <td>{{$project->professional_family}}</td>
        <td>{{$project->status}}</td>
        <td>
            <a href="{{ route('projects.edit', [$project->id_project]) }}"><img src="/resources/img/edit.svg" width="20" height="20" class="mr-2"></a>
            <a href="{{ route('projects.destroy', [$project->id_project]) }}"><img src="/resources/img/delete.svg" width="20" height="20"></a>
        </td>

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
@stop
