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
         <th>Email</th>
         <th>Nom</th>
         <th>Codi</th>
         <th>Tipus</th>
         <th>Estat</th>

         <td colspan="2"><strong>Accions</strong></td>
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
         <td>{{ $school->status }}</td>
         <td>
            <a href="{{route('schoolsUsers.manager', $school->id_school)}}"><i style="color: #116466; height: 20px;" class="material-icons large align-bottom mr-2">person_add</i></a>
            <a href="{{ route('schools.edit',$school->id_school)}}"><img src={{ asset('img/edit.svg') }} width="20" height="20" class="mr-2"></a>
            @if($school->status == "active")
               <a data-toggle="modal" data-target="#deleteConfirmationModal"><img src={{ asset('img/delete.svg') }} width="20" height="20" alt="icona per a eliminar"></a>           
            @endif
         </td>
      </tr>

      <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Estàs segur d'eliminar l'empresa?</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-footer">
                     <button type="button" name="cancel" class="btn btn-success" data-dismiss="modal">Cancela</button>
                     <a type="button" class="btn btn-danger" name="delete" href="{{ route('schools.destroy', $school->id_school) }}">Elimina</a>
                 </div>
             </div>
         </div>
     </div>
      @endforeach
   </tbody>
</table>
@stop