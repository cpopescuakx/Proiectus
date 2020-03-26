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
        <th>ID</th>
        <th>Tipus</th>
        <th>Tema</th>
        <th>Prioritat</th>
        <th>Autor</th>
        <th>Responsable</th>
        <th>Estat</th>
        <th colspan="2">Accions</th>
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
        <td>{{$ticket->id_ticket}}</td>
        <td>{{$ticket->type}}</td>
        <td>{{$ticket->topic}}</td>
        <td>
        <?php if($ticket->priority == "low"){echo "Baixa";} elseif($ticket->priority == "medium"){echo "Mitjana";} else {echo "Alta";}; ?>
        </td>
        <td>
            @foreach($users as $user)
                <?php if($ticket->id_author == $user->id){ echo "{$user->firstname} {$user->lastname}";} ?>
            @endforeach
        </td>
        
        <td>
        @foreach($users as $user)
        <?php if($ticket->id_assigned_user == $user->id){ echo "{$user->firstname} {$user->lastname}";} ?>
        @endforeach
        </td>
        <td>
        <?php if($ticket->status == "pending"){echo "Pendent";} elseif($ticket->status == "in progress"){echo "En procés";} else {echo "Resolt";}; ?>
        </td>
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
