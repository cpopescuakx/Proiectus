@extends('layouts.default')

@section('content')
<div class="col">
   <div class="row d-flex justify-content-end p-4">
      <a href="{{ route('schools.create') }}"><img src={{ asset('img/add.svg') }} width="45" height="45"></a>
   </div>
</div>
<table class="table table-hover mr-5">
   <thead>
      <tr>
         <th>ID</th>
         <th>EMAIL</th>
         <th>NOM</th>
         <th>CODI</th>
         <th>TIPUS</th>
         <th>GESTOR</th>
         <td colspan="2">Accions</td>
      </tr>
   </thead>

   @if ($message = Session::get('success'))
   <div class="alert alert-success">
      <p>{{$message}}</p>
   </div>
   @endif

   <tbody>
   @foreach($schools as $school)
      <tr>
         <td>{{ $school->id_school }}</td>
         <td>{{ $school->email }}</td>
         <td>{{ $school->name }}</td>
         <td>{{ $school->code }}</td>
         <td>{{ $school->type }}</td>
         <td>{{ $school->user->username }}</td>
         <td>
            <a href="{{ route('pendingSchools.approve',$school->id_school)}}"><img src={{ asset('img/checkIcon.svg') }} width="20" height="20" class="mr-2"></a>
            <a href="{{ route('pendingSchools.deny',$school->id_school) }}"><img src={{ asset('img/delete.svg') }} width="20" height="20"></a>
         </td>
      </tr>
      @endforeach

   </tbody>
</table>
@stop