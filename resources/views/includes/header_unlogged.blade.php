<!--<nav class="navbar navbar-expand-md  navbar-light">-->

<nav class="navbar navbar-expand-md navbar-light fixed-top" role="navigation">

    <img class="my-0 mr-md-auto" href="#" src="img/icono_negro.png" alt="" width="40px" height="40px">

    <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse"
        data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <!-- Inicio elementos menu -->
        <ul class="navbar-nav mr-auto">
            <!-- Elemento menu -->
            @if(Auth::user())
                <li class="nav-item">
                    <a href="{{ route('managers.indexP1', ['id' => Auth::user()->id]) }}"
                        class="nav-link text-ternari p-2 text-dark">Tauler<span class="sr-only">(current)</span></a>
                </li>
                <!-- Fin elemento menu -->
            @endif

            @guest
                <!-- Elemento menu -->
                <li class="nav-item">
                    <a class="nav-link text-ternari p-2 text-dark" href="#que_es_proiectus">Què és Proiectus?<span
                            class="sr-only">(current)</span></a>
                </li>
                <!-- Fin elemento menu -->

                <!-- Elemento menu -->
                <li class="nav-item">
                    <a class="nav-link text-ternari p-2 text-dark" href="#com_funciona">Com funciona?<span
                            class="sr-only">(current)</span></a>
                </li>
                <!-- Fin elemento menu -->

                <!-- Elemento menu -->
                <li class="nav-item">
                    <a class="nav-link text-ternari p-2 text-dark font-weight-bold" href="register">Registra't<span
                            class="sr-only">(current)</span></a>
                </li>
                <!-- Fin elemento menu -->

                <!-- Elemento menu -->
                <li class="nav-item ml-3">
                    <a type="button" class="btn btn-outline-primary" href="login">Inicia sessió<span
                            class="sr-only">(current)</span></a>
                </li>
            @else
                <li class="nav-item ml-3">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->username }}
                    </a>
                    <!-- Login con dropdown -->
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <!-- User Profile -->
                        <a class="dropdown-item"
                            href="{{ route('managers.indexP1', ['id' => Auth::user()->id]) }}">Perfil
                            d'usuari</a>
                        <!-- TO-DO: Invite new users -->
                        <a class="dropdown-item" href="{{ route('invitacio') }}">Convidar a un nou
                            usuari</a>
                        <div class="dropdown-divider"></div>
                        <!-- Incidences -->
                        <a class="dropdown-item" href="{{ route('tickets.create') }}">Notificar un
                            error</a>
                        <div class="dropdown-divider"></div>
                        <!-- Logout -->
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                <!-- Fin elemento menu -->
            @endif

        </ul>
    </div>
</nav>
