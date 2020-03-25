@extends('layouts.default')

@section('content')
<div class=" formulari ">
    <form class="was-validated" action="{{ route('companiesUsers.index', Request::route('id'))}}" method="POST" autocomplete="nofill">
        @csrf
        <div class="row justify-content-center">
            <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-10">
                <div class="container">
                    <div class="contact-image text-center mt-3">
                        <img class="form-img" src="{{ asset('img/icono_negro.png') }}" />
                    </div>
                </div>
                <div class="container contact-form">
                    <div class="container">
                        <div class="row no-gutters justify-content-center mt-5">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <h1 class="text-center">Afegir gestor empresa</h1>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <strong>Nom</strong>

                                <select class="selectpicker form-control" data-live-search="true" title="">
                                    @foreach($users as $user)
                                        <option data-tokens="{{$user->id}}" value="{{$user->id}}">{{$user->firstname. ' '. $user->lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <button type="submit" name="sbumit" class="btn btn-primary">Afegeix</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@stop

@endsection
