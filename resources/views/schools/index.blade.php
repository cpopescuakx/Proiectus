@extends('layouts.default')

@section('content')
@mapstyles

<div class="col">
  <br></br>
  <h3 class="align-middle">GESTIÓ D'ESCOLES</h3>
   <div class="row d-flex justify-content-end p-4">
      <a href="{{ route('schools.create') }}"><img src={{ asset('public/public/img/add.svg') }} width="45" height="45"></a>
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
           @if(Auth::guest())
           @else
           @if (Auth::user()->id_role == 1)
            <a href="{{route('schoolsUsers.manager', $school->id_school)}}"><i style="color: #116466; height: 20px;" class="material-icons large align-bottom mr-2">person_add</i></a>
            @endif
            @endif
            <a href="{{ route('schools.edit',$school->id_school)}}"><img src={{ asset('public/img/edit.svg') }} width="20" height="20" class="mr-2"></a>
            @if($school->status == "active")
               <a data-toggle="modal" data-target="#deleteConfirmationModal"><img src={{ asset('public/img/delete.svg') }} width="20" height="20" alt="icona per a eliminar"></a>
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
<div class="row featurette justify-content-center">
   <div class="col-md-7">

   <h2 class="featurette-heading mb-3">Localització dels centres</h2>

<style>
   /* Always set the map height explicitly to define the size of the div
    * element that contains the map. */
   #map2 {
   height: 400px;
   width: 530px;
   }
   </style>
   <div id="map2">

   </div>
   </div>

   <script>
      var map;
      var insTecnificacio = {lat:40.708262, lng:0.582430};
      var iesMontsia = {lat:40.709150, lng: 0.582557};
      var insBerenguer = {lat:40.709957, lng: 0.581329};
      function initMap() {
         map = new google.maps.Map(document.getElementById('map2'), {
         center: iesMontsia,
         zoom: 17
         });
         var marker1 = new google.maps.Marker({
         position: iesMontsia,
         map: map,
         title: 'IES Montsià'
         });
         var marker2 = new google.maps.Marker({
         position: insBerenguer,
         map: map,
         title: 'Institut Ramon Berenguer'
         });
         var marker4 = new google.maps.Marker({
         position: insTecnificacio,
         map: map,
         title: 'Institut de Tecnificació Amposta'
         });
      }
   </script>
 </div>
@mapscripts
@stop
