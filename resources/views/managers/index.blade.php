@extends('layouts.default')
@inject('city', 'App\Http\Controllers\CityController') {{-- Importa el controlador de ciutat --}}

@section('content')
<?php error_reporting(0);?>
<div class="col">
    <div class="row d-flex justify-content-end p-4">
      <a href="{{ route('managers.create') }}"><img src={{ asset('img/add.svg') }} width="45" height="45" ></a>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
        <th>ID</th>
         <th>EMAIL</th>
         <th>NOM</th>
         <th>DNI</th>
         <th>LOCALITAT</th>
        
         <td colspan="2"><strong>Accions</strong></td>
        </tr>
    </thead>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <tbody>

        @foreach($managers as $manager)

            <tr>
                <td>{{ $manager->id }}</td>
                <td>{{ $manager->username }}</td>
                <td>{{ $manager->email }}</td>
                <td>{{ $manager->dni }}</td>
                <td>{{ $city::agafarNom($manager->id_city) }}
                <td>
                    <a href="{{ route('managers.edit', $manager->id) }}"><img src={{ asset('img/edit.svg') }} width="20" height="20" class="mr-2"></a>
                    @if($manager->status == "active")
                        <a href="{{ route('managers.destroy', $manager->id) }}"><img src={{ asset('img/delete.svg') }} width="20" height="20"></a>
                    @endif
                </td>
            </tr>
            @endforeach
    </tbody>
</table>
<a width="300px" height="500px" class="twitter-timeline" href="https://twitter.com/insmontsia?ref_src=twsrc%5Etfw">Tweets by insmontsia</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endsection