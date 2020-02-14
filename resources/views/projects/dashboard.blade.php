@extends('layouts.default')

@section('content')
<body>
<div class="container text-center">
    <h1>Tots els projectes</h1>
    <div class="row justify-content-center">
        <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6 mt-4 mb-4">
            <input class="form-control" placeholder="Buscar..."/>
        </div>
    </div>
</div>
<div class="container d-flex justify-content-center">
    <div class="row d-flex justify-content-center w-100">
        @foreach ($projects as $project)
            <div class="column">
                <div class="card mt-2 ml-2 mb-2 mr-2">
                    <img class="card-img-top" src="{{asset('img/foto_small.jpg')}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$project->name}}</h5>
                        <a href=""><button class="btn bg-primary1 mt-2 project-info-btn">Més informació</button></a>
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
