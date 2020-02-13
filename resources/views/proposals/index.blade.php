@extends('layouts.default')

@section('content')
<div class="col">
  <div class="row d-flex p-4 justify-content-between">
    <!-- Filtro -->
    <nav class="navbar navbar-light">
        <form class="form-inline">
            <select name="tipo" class="custom-select mr-2">
                <option selected>Open this select menu</option>
                <option>active</option>
                <option>inactive</option>
              </select>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </nav>
    <a href="{{ route('proposals.create') }}"><img src={{ asset('img/add.svg') }} width="45" height="45" ></a>
  </div>
</div>
<table class="table table-hover mr-5">
    <thead>
        <tr>
            <td>Nom</td>
            <td>Data d'inici</td>
            <td>Data de finalització</td>
            <td>Description</td>
            <td>Category</td>
            <td>Familia professional</td>
            <td colspan="2">Accions</td>
        </tr>
    </thead>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif


    <tbody>
        @foreach($proposals as $proposal)
        <tr>
            <td>{{$proposal->name}}</td>
            <td>{{$proposal->created_at}}</td>
            <td>{{$proposal->limit_date}}</td>
            <td>{{$proposal->description}}</td>
            <td>{{$proposal->category}}</td>
            <td>{{$proposal->professional_family}}</td>
            <td>
                <a href="{{ route('proposals.edit', [$proposal->id_proposal]) }}"><img src={{ asset('img/edit.svg') }} width="20" height="20" class="mr-2"></a>
                <a href="{{ route('proposals.destroy', [$proposal->id_proposal]) }}"><img src={{ asset('img/delete.svg') }} width="20" height="20"></a>
            </td>
        </tr>
        @endforeach

        
    </tbody>
</table>
<div class="d-flex pt-5 justify-content-center">
    <div class="inline-block">{{ $proposals->appends('tipo', request('tipo'))->links() }}</div>
</div>
@stop
