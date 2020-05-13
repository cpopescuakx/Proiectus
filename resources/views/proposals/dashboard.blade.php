@extends('layouts.default')

@section('content')

<body>
    <div class="container text-center">
        <h1 class="pt-4">Les meves propostes</h1>
        <div class="row justify-content-center">

            <form class="form-inline justify-content-center m-4"
                action="{{ route('proposals.dashboard') }}" method="GET">
                <input name="name" class="form-control" placeholder="Cercar...">
                <button type="submit" class="btn bg-primary1 text-white ml-2">Cercar</button>
            </form>

        </div>
    </div>

    <div class="container justify-content-center">
        <div class="row justify-content-center">

            @foreach($proposals as $proposal)
                <div class="column">
                    <div class="card m-2">
                        <img class="card-img-top" src="{{ asset('img/foto_small.jpg') }}">
                        <div class="card-body">
                            <h3 style="width: 20rem;" class="card-title text-truncate">{{ $proposal->name }}</h5>
                                <!-- Lógica que cambia los valores de la bbdd por valores reales -->
                                @if($proposal->category == 'school')
                                    <h5 style="width: 10rem;" class="card-title">Institut</h5>
                                @else
                                    <h5 style="width: 10rem;" class="card-title">Empresa</h5>
                                @endif

                                <a href="{{ route('proposals.show', $proposal->id_proposal) }}">
                                    <button class="btn bg-primary1 mt-2 proposal-info-btn text-white">
                                        Més informació
                                    </button>
                                </a>
                                @if($proposal->status == 'inactive')
                                    <p class="text-muted mt-3 mb-0 float-right"><i
                                            class="mr-2 fas fa-exclamation-circle"></i>Innactiva</p>
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
</body>

@stop
