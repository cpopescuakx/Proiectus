@extends('layouts.default')

@section('content')
<h1>Crear alumne</h1>
<form action="{{route('students.store')}}" method="POST">
    @csrf
    <label>Nom</label>
    <input type="text" name="firstname"/>
    <br />
    <label>Cognom</label>
    <input type="text" name="lastname"/>
    <br />
    <label>Nom d'usuari</label>
    <input type="text" name="name"/>
    <label>DNI</label>
    <input type="text" name="dni"/>
    <br />
    <label>Data de naixement</label>
    <input type="text" name="birthdate"/>
    <br />
    <label>Email</label>
    <input type="text" name="email"/>
    <br />
    <label>Contrassenya</label>
    <input type="text" name="password"/>
    <br />

    <button type="submit">Crear</button>
</form>

@endsection
