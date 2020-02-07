@extends('layouts.default')

@section('content')
<table class="table table-striped">
<a href="{{route('students.create')}}">Crear</a>
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
        <td>
            <a href="{{ route('students.edit', [$student->id]) }}"><img src={{ asset('img/edit.svg') }} width="20" height="20" class="mr-2"></a>
           {{-- <a href="{{ route('projects.destroy', [$project->id]) }}"><img src={{ asset('img/delete.svg') }} width="20" height="20"></a> --}}
        </td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection
