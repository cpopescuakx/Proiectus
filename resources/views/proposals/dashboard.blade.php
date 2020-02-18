@extends('layouts.default')

@section('content')
<body>
    <div class="container text-center">
        <h1 class="pt-4">Les meves propostes</h1>
        <div class="row justify-content-center">

                  <form class ="form-inline jsutify-content-center m-4" action="{{route('proposals.dashboard')}}" method = "GET" >
                      <input name = "name" class="form-control" placeholder="Cercar...">
                    <button style="color: white;" type="submit" class="btn bg-primary1 ml-2">Cercar</button>
                </form>
        </div>
    </div>

    <div class="container justify-content-center">
        <div class="row justify-content-center">

            @foreach ($userProposals as $proposal)

                <div class="column">
                    <div class="card m-2">
                        <img class="card-img-top" src="{{asset('img/foto_small.jpg')}}">
                        <div class="card-body">
                            <h5 style="width: 15rem;" class="text-truncate card-title">{{$proposal->name}}</h5>
                            <a href="{{route('proposals.show', $proposal->id_proposal)}}"><button style="color: white;" class="btn bg-primary1 mt-2 proposal-info-btn">Més informació</button></a>
                            @if ($proposal->status == 'inactive')
                                <p class="text-muted mt-3 mb-0 float-right"><i class="mr-2 fas fa-exclamation-circle"></i>Innactiva</p>
                            @endif
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>

    <div class="d-flex pt-5 justify-content-center">
      <div class="inline-block">{{ $userProposals->links() }}</div>
    </div>
</body>

@stop
