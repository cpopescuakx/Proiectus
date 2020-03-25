@extends('layouts.default')

@section('content')
  <div style="padding: 10px">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crear Article</h2>
                </br>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> S'han produït alguns problemes amb la vostra entrada.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="formulari">
        <form class="was-validated" action="update" method="POST">
            @csrf
            <div class="row justify-content-center">
            <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-10">
            <div class="form-group mt-4">
                <div class="row justify-content-center">
                     <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                        <label for="nom">Versió</label>
                            <input type="text" name = "version" class="form-control" placeholder="versió" required>
                                <div class="invalid-feedback">Camp necessari</div>
                    </div>
                </div>
            </div>
            <div class="form-group mt-4">
                <div class="row justify-content-center">
                     <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                        <label for="nom">Titol</label>
                            <input type="text" name = "title" class="form-control" placeholder="titol" required>
                                <div class="invalid-feedback">Camp necessari</div>
                    </div>
                </div>
            </div>
            <div class="form-group mt-4">
                <div class="row justify-content-center">
                     <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                        <label for="nom">Contingut</label>
                            <input type="text" name = "content" class="form-control" placeholder="contingut" required>
                                <div class="invalid-feedback">Camp necessari</div>
                    </div>
                </div>
            </div>
            <div class="form-group mt-4">
                <div class="row justify-content-center">
                     <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                        <label for="nom">Referència</label>
                            <input type="text" name = "reference" class="form-control" placeholder="referència" required>
                                <div class="invalid-feedback">Camp necessari</div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row justify-content-center">
                    <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                        <button type="submit" name = "sbumit" class="btn btn-primary float-right">Crear</button>
                            <a style="margin-right: 10px" class="btn btn-primary float-right" href="{{ url('wiki', [$id_project]) }}">Enrere</a>
                    </div>
                </div>
             </div>
        </div>
    </form>
  </div>
@endsection
