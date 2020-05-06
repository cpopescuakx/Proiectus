@extends('layouts.default')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Invita un usuari
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{route('process_invite')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Adreça email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Entra Email">
                                <small id="emailHelp" class="form-text text-muted">Mai compartirem la seva informació.</small>
                            </div>
                            <a role="button" class="btn btn-primary" href="{{URL::previous()}}">Enrere</a>
                            <button type="submit" class="btn btn-primary float-right">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
