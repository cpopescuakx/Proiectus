@extends('layouts.app')

@section('content')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inicia sessió') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __("Nom d'usuari") }}</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contrasenya') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recorda\'m') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="submit" type="submit" class="btn btn-primary"> <!-- disabled="true" -->
                                    {{ __('Inicia sessió') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Has oblidat la teva contrasenya?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <br/>
                        <!--
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <div class="g-recaptcha" data-sitekey="6Ldv7O8UAAAAALnodAqQxwaWfJHVNZMR7u8yRYZQ"  data-callback="recaptcha_ok"></div>
                            </div>
                        </div>
                        -->
                        <script>
                        /*
                        function recaptcha_ok () {
                            var response = grecaptcha.getResponse();
                            if(response.length == 0){
                                console.log("Captcha no verificado")
                            } else {
                                console.log("Captcha verificado");
                                document.getElementById("submit").disabled = false;
                            }
                        }
                        */
                        </script>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
