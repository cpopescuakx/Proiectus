@extends('layouts.default')

@section('content')

@mapstyles

<div class="col">
  <div class="row d-flex justify-content-end p-4">
    <a href="{{ route('projects.create') }}"><img src={{ asset('img/add.svg') }} width="45" height="45" ></a>
  </div>
</div>

<table class="table table-hover mr-5">
<thead>
    <tr>
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
</table>

<div class="row featurette justify-content-center">
    <div class="col-md-7">

    <h2 class="featurette-heading mb-3">Localitzacions</h2>

 <style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
    height: 400px;
    width: 530px;
    }
    </style>
    <div id="map">

    </div>
    </div>

    <iframe title="Consells de Taylor Otwell" width="560" height="330" src="https://www.youtube.com/embed/Ic_Kkmzm3uQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    <script>
       var map;

       var iesMontsia = {lat: 40.709150, lng: 0.582557};
       var consellComarcal = {lat: 40.7085462, lng: 0.5728294}

       function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 40.7089797, lng: 0.5749788},
            zoom: 15
            });

            var marker1 = new google.maps.Marker({
            position: iesMontsia,
            map: map,
            title: 'IES Montsià'
            });

            var marker2 = new google.maps.Marker({
            position: consellComarcal,
            map: map,
            title: 'Consell Comarcal del Montsià'
            });
        }
    </script>
  </div>
 @mapscripts

@stop
