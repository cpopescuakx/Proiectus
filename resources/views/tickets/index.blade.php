@extends('layouts.default')

@section('content')
<div class="col">
  <div class="row d-flex justify-content-end p-4">
    <a href="{{ route('tickets.create') }}"><img src={{ asset('img/add.svg') }} width="45" height="45" ></a>
  </div>  
</div>
<table class="table table-hover mr-5">
<thead>
    <tr>
        <td>ID</td>
        <td>Tipus</td>
        <td>Tema</td>
        <td>Prioritat</td>
        <td>Responsable</td>
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
    @foreach($tickets as $ticket)
    <tr>
        <td>{{ ++$i }}</td>

        {{--<td>{{$ticket->id_ticket}}</td>--}}
        <td>{{$ticket->type}}</td>
        <td>{{$ticket->topic}}</td>
        <td>{{$ticket->priority}}</td>
        <td>{{$ticket->id_assigned_user}}</td>
        <td>{{$ticket->status}}</td>
        <td>
            <a href="{{ route('tickets.edit', [$ticket->id_ticket]) }}"><img src={{ asset('img/edit.svg') }} width="20" height="20" class="mr-2"></a>
            <a href="{{ route('tickets.destroy', [$ticket->id_ticket]) }}"><img src={{ asset('img/delete.svg') }} width="20" height="20"></a>
        </td>

        {{-- <td><a href="{{ route('tickets.edit', $ticket->id)}}" class="btn btn-primary">Editar</a></td> --}}
        {{-- <td>
            <form action="{{ route('tickets.destroy', $ticket->id)}}" method="post">
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
