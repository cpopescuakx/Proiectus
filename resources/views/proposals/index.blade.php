@extends('layouts.default')

@section('content')
<div class="col">
  <div class="row d-flex justify-content-end p-4">
    <a href="{{ route('proposals.create') }}"><img src={{ asset('img/add.svg') }} width="45" height="45" ></a>
  </div>
</div>
<table class="table table-hover mr-5">
<thead>
    <tr>
        <td>ID</td>
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
    @foreach($proposals as $proposal)
    <tr>
        <td>{{ ++$i }}</td>

        {{--<td>{{$proposal->id_proposal}}</td>--}}
        <td>{{$proposal->name}}</td>
        <td>{{$proposal->created_at}}</td>
        <td>{{$proposal->updated_at}}</td>
        <td>{{$proposal->description}}</td>
        <td>{{$proposal->limit_date}}</td>
        <td>{{$proposal->id_author}}</td>
        <td>{{$proposal->category}}</td>
        <td>{{$proposal->professional_family}}</td>
        <td>{{$proposal->status}}</td>
        <td>
            <a href="{{ route('proposals.edit', [$proposal->id_proposal]) }}"><img src={{ asset('img/edit.svg') }} width="20" height="20" class="mr-2"></a>
            <a href="{{ route('proposals.destroy', [$proposal->id_proposal]) }}"><img src={{ asset('img/delete.svg') }} width="20" height="20"></a>
        </td>

        {{-- <td><a href="{{ route('proposals.edit', $proposal->id)}}" class="btn btn-primary">Editar</a></td> --}}
        {{-- <td>
              <form action="{{ route('proposals.destroy', $proposal->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Esborrar</button>
            </form>
        </td> --}}

    </tr>
    @endforeach
</tbody>
</table>
@stop