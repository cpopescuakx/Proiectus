@extends('layouts.default')
@inject('city', 'App\Http\Controllers\CityController') {{-- Importa el controlador de ciutat --}}

@section('content')
<?php error_reporting(0);?>
<div class="col">
    <div class="row d-flex justify-content-end p-4">
      <a class="mr-3" href="{{ route('tickets.index') }}"><i class="large material-icons large align-bottom" style="color: #116466; font-size: 50px;" alt="icona per als tickets">markunread</i></a>
      <a class="mr-3" href="{{ route('managers.create') }}"><img src={{ asset('img/add.svg') }} width="45" height="45" alt="icona per a afegir"></a>
      <a href="{{ route('managers.csv') }}"><i class="fas fa-file-csv" style="color: #116466; font-size: 45px;"></i></a>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
        <th>NOM</th>
        <th>EMAIL</th>
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
                <td>{{ $manager->username }}</td>
                <td>{{ $manager->email }}</td>
                <td>{{ $manager->dni }}</td>
                <td>{{ $city::agafarNom($manager->id_city) }}
                <td>

                    <a href="{{ route('managers.edit', $manager->id) }}"><img src={{ asset('img/edit.svg') }} width="20" height="20" class="mr-2" alt="icona per a editar"></a>

                    @if($manager->status == "active")
                        <a href="{{ route('managers.destroy', $manager->id) }}"><img src={{ asset('img/delete.svg') }} width="20" height="20" alt="icona per a eliminar"></a>
                    @endif

                </td>
            </tr>
            @endforeach
    </tbody>
</table>
@endsection
