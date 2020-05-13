@extends('layouts.default')

@section('content')
<div class="container text-center">
    <h1 class="mt-4">Totes les propostes</h1>
    <div class="row justify-content-center">

        <form class="form-inline justify-content-center m-4" action="{{ route('proposals.all') }}" method="GET">
            <input name="name" class="form-control" placeholder="Cercar...">
            <button type="submit" class="btn bg-primary1 ml-2 text-white">Cercar</button>
        </form>
        @if((Auth::user()->id_role == 5))
        <a class="tooltipProposal" href="{{ route('proposals.create') }}"><img src={{ asset('img/add.svg') }} width="45" height="45" ><span class="tooltiptext">Crear proposta</span></a>
        @endif
    </div>
</div>

<div class="container justify-content-center">
    <div class="row justify-content-center">

        @foreach($proposals as $proposal)
            <div class="column">
                <div class="card m-2">
                    <img class="card-img-top" src="{{ asset('img/foto_small.jpg') }}">
                    <div class="card-body">
                        <h3 style="width: 20rem;" class="text-truncate card-title">{{ $proposal->name }}</h5>

                            <!-- Lógica que cambia los valores de la bbdd por valores reales -->
                            @if($proposal->category == 'school')
                                <h5 style="width: 10rem;" class="card-title">Institut</h5>
                            @else
                                <h5 style="width: 10rem;" class="card-title">Empresa</h5>
                            @endif
                            <a href="{{ route('proposals.show', $proposal->id_proposal) }}">
                                <button class="btn bg-primary1 mt-2 proposal-info-btn text-white">Més informació</button>
                            </a>
                            @if($proposal->status == 'inactive')
                                <p class="text-muted mt-3 mb-0 float-right"><i class="mr-2 fas fa-exclamation-circle"></i>Innactiva</p>
                            @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="d-flex pt-5 justify-content-center">
    <div class="inline-block">{{ $proposals->links() }}</div>
</div>

@endsection
