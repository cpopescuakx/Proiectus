@extends('layouts.default')

@section('content')
<body>
    <div class="container text-center">
        <h1 class="pt-4">Tots els projectes</h1>
        <div class="row justify-content-center">

                <form class ="form-inline justify-content-center m-4" action="{{route('projects.dashboard')}}" method = "GET" >
                    <input name = "name" class="form-control shadow" placeholder="Buscar...">
                    <button style="color: white;" type="submit" class="btn bg-primary1 ml-2 shadow">Buscar</button>
                </form>
        </div>
    </div>

    <div class="container justify-content-center">
        <div class="row justify-content-center">
            @foreach ($projects as $project)
                <div class="column">
                    <div class="card m-2 shadow mb-5">
                        <img class="card-img-top" src="{{asset('img/foto_small.jpg')}}">
                        <div class="card-body">
                            <h5 style="width: 15rem;" class="text-truncate card-title">{{$project->name}}</h5>
                            <a href="{{route('projects.show', $project->id_project)}}"><button style="color: white;" class="btn bg-primary1 mt-2 project-info-btn">Més informació</button></a>
                            @if ($project->status == 'inactive')
                                <p class="text-muted mt-3 mb-0 float-right"><i class="mr-2 fas fa-exclamation-circle"></i>Innactiu</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex pt-5 justify-content-center">
        <div class="inline-block">{{ $projects->links() }}</div>
    </div>
</body>

@stop
