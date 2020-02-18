@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link active" href="#1b" data-toggle="tab">Institut</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#2b" data-toggle="tab">Empresa</a>
            </li>
        </ul>
    </div>
</div>
<br>

<div class="tab-content clearfix">
    <div class="tab-pane active" id="1b">
        <form method="POST" action="{{ route('entityRegistration.store', ['school']) }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                <div class="col-md-5">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="username" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Adreça') }}</label>

                <div class="col-md-5">
                    <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Ciutat') }}</label>

                <div class="col-md-5">
                    <datalist id="cities">
                        @foreach($cities as $city)
                        <option value="{{$city->name}}">
                            @endforeach
                    </datalist>
                    <input type="text" name="city" class="form-control" list="cities" autocomplete="no_fill" required>

                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telèfon') }}</label>

                <div class="col-md-5">
                    <input id="phone" type="tel" pattern="[0-9]{9}" maxlength="9" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="no_fill">

                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Tipus') }}</label>

                <div class="col-md-5">
                    <datalist id="type">
                        <option value="Batxillerat"></option>
                        <option value="FP"></option>
                        <option value="Universitat"></option>
                    </datalist>
                    <input type="text" class="form-control" col="4" name="type" list="type" autocomplete="off" required>
                    @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Codi') }}</label>

                <div class="col-md-5">
                    <input id="code" type="code" class="form-control" name="code" required autocomplete="no_fill">
                    @error('code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-5 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>


    </div>
    <div class="tab-pane" id="2b">
    <form method="POST" action="{{ route('entityRegistration.store', ['school']) }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                <div class="col-md-5">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="username" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Adreça') }}</label>

                <div class="col-md-5">
                    <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Ciutat') }}</label>

                <div class="col-md-5">
                    <datalist id="cities">
                        @foreach($cities as $city)
                        <option value="{{$city->name}}">
                            @endforeach
                    </datalist>
                    <input type="text" name="city" class="form-control" list="cities" autocomplete="no_fill" required>

                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telèfon') }}</label>

                <div class="col-md-5">
                    <input id="phone" type="tel" pattern="[0-9]{9}" maxlength="9" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="no_fill">

                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="sector" class="col-md-4 col-form-label text-md-right">{{ __('Sector') }}</label>

                <div class="col-md-5">
                    <input id="sector" type="sector" class="form-control" name="sector" required autocomplete="no_fill">
                    @error('sector')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="nif" class="col-md-4 col-form-label text-md-right">{{ __('Nif') }}</label>

                <div class="col-md-5">
                    <input id="nif" type="nif" class="form-control" name="nif" required autocomplete="no_fill">
                    @error('nif')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-5 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

@endsection