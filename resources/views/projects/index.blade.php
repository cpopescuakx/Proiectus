@extends('layouts.default')

@section('content')
@if((Auth::user()->id_role == 1 || Auth::user()->id_role == 5))
<div class="col">
  <div class="row d-flex justify-content-end p-4">
    <a href="{{ route('projects.create') }}"><img src={{ asset('img/add.svg') }} width="45" height="45" ></a>
  </div>
</div>
@endif
<table class="table table-hover mr-5">
<thead>
    <tr>
        <td>Nom</td>
        <td>Data d'inici</td>
        <td>Data de finalització</td>
        <td>Pressupost</td>
        <td>Familia professional</td>
        @if((Auth::user()->id_role == 1 || Auth::user()->id_role == 5))
        <td>Estat</td>
        <td colspan="2">Accions</td>
        @endif
    </tr>
</thead>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
@endif


@if((Auth::user()->id_role == 1 || Auth::user()->id_role == 5))
<tbody>
    @foreach($projects as $project)
    <tr>

        <td>{{$project->name}}</td>
        <td>{{$project->created_at}}</td>
        <td>{{$project->ending_date}}</td>
        <td>{{$project->budget}}</td>
        <td>{{$project->professional_family}}</td>
        <td>{{$project->status}}</td>
        <td>
            <a href="{{ route('projects.edit', [$project->id_project]) }}"><img src={{ asset('img/edit.svg') }} width="20" height="20" class="mr-2"></a>
            <a href="{{ route('projects.destroy', [$project->id_project]) }}"><img src={{ asset('img/delete.svg') }} width="20" height="20"></a>
        </td>
    </tr>
    @endforeach
</tbody>
@endif

@if((Auth::user()->id_role == 3 || Auth::user()->id_role == 4))
<tbody>
    @foreach($projects as $project)
    <tr>
        <td>{{$project->name}}</td>
        <td>{{$project->created_at}}</td>
        <td>{{$project->ending_date}}</td>
        <td>{{$project->budget}}</td>
        <td>{{$project->professional_family}}</td>
    </tr>
    @endforeach
</tbody>
@endif
</table>
@stop
