@extends('layouts.default')

@section('content')
<div class="col">
  <div class="row d-flex justify-content-between">
    <!-- Filtro -->
    <nav class="navbar navbar-light mb-3">
        <form class="form-inline">
            <h4 style="margin-right: 1rem">Llistat Propostes</h4>
            <select name="tipo" class="custom-select mr-2">
                <option value="active" selected>Actives</option>
                <option value="inactive">Inactives</option>
            </select>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cercar</button>
        </form>
      </nav>
    <a href="{{ route('proposals.create') }}"><img src={{ asset('public/img/add.svg') }} width="45" height="45" ></a>
  </div>
</div>
<table class="table table-hover mr-5">
    <thead>
        <tr>
            <td class="font-weight-bold">Nom</td>
            <td class="font-weight-bold">Data d'inici</td>
            <td class="font-weight-bold">Data de finalització</td>
            <td class="font-weight-bold">Descripció</td>
            <td class="font-weight-bold">Categoria</td>
            <td class="font-weight-bold">Familia professional</td>
            <td class="font-weight-bold">Accions</td>
        </tr>
    </thead>

    @if ($message = Session::get('success'))
        <div class="alert alert-success m-2">
            <p>{{$message}}</p>
        </div>
    @endif


    <tbody>
        @foreach($proposals as $proposal)

        <tr>
                <td><a href="{{ route('proposals.show', $proposal->id_proposal) }}">{{ $proposal->name }}</a></td>
                <td>{{ date('d/m/Y', strtotime($proposal->created_at)) }}</td> <!-- Cambio en el formato de fecha -->
                <td>{{ date('d/m/Y', strtotime($proposal->limit_date)) }}</td>
                <td>{{ $proposal->description }}</td>
                <td>{{ $proposal->category }}</td>
                <td>{{ $proposal->professional_family }}</td>

                <td class="d-inline-flex">
                    <a href="{{ route('proposals.edit', [$proposal->id_proposal])}}"><i class="material-icons text-dark" data-toggle="tooltip" title="Editar proposta">create</i></a>
                    @if($proposal->status == "active")
                    <a href="{{ route('proposals.inactive', [$proposal->id_proposal]) }}"><i class="material-icons text-dark" data-toggle="tooltip" title="Posar inactiva">visibility</i></a>
                    @else
                    <a href="{{ route('proposals.active', [$proposal->id_proposal]) }}"><i class="material-icons text-dark" data-toggle="tooltip" title="Posar activa">visibility_off</i></a>
                    @endif
                    <a href="{{ route('proposals.destroy', [$proposal->id_proposal]) }}" onclick="return confirm('Are you sure?')" data-toggle="tooltip" title="Eliminar proposta"><i class="material-icons text-danger">block</i></a>
                </td>
        </tr>
        @endforeach


    </tbody>
</table>
<div class="d-flex pt-5 justify-content-center">
    <div class="inline-block">{{ $proposals->appends('tipo', request('tipo'))->links() }}</div>
</div>
@stop
