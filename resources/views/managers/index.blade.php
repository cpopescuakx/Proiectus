@extends('layouts.default')
@inject('city', 'App\Http\Controllers\CityController') {{-- Importa el controlador de ciutat --}}

@section('content')

<div class="col">
    <div class="row d-flex justify-content-end p-4">
      <a href="{{ route('managers.create') }}"><img src={{ asset('img/add.svg') }} width="45" height="45" ></a>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <td><strong>Nom</strong></td>
            <td><strong>Cognom</strong></td>
            <td><strong>Usuari</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>DNI</strong></td>
            <td><strong>Ciutat</strong></td>
            <td><strong>Estat</strong></td>
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
                <td>{{$manager->firstname}}</td>
                <td>{{$manager->lastname}}</td>
                <td>{{$manager->name}}</td>
                <td>{{$manager->email}}</td>
                <td>{{$manager->dni}}</td>
                <td>{{$city::agafarNom($student->id_city)}}
                <td>{{$manager->status}}</td>
                <td>
                    <a href="{{ route('managers.edit', [$manager->id]) }}"><img src={{ asset('img/edit.svg') }} width="20" height="20" class="mr-2"></a>
                    @if($student->status == "active")
                        <a href="{{ route('managers.destroy', [$manager->id]) }}"><img src={{ asset('img/delete.svg') }} width="20" height="20"></a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
