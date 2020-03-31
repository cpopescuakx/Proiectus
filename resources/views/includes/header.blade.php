
<div id="menu" class="closed">
    <!-- Inicio sidenav -->
    <nav id="sidenav" class="bg-primary1">
        <ul class="nav flex-column">
            <!-- Logo -->
            <li class="nav-item">
                <a class="navbar-brand" href="">
                    <img src="{{ asset('img/icono_light.png') }}" width="30" height="30" class="d-inline-block align-top" alt="" href="{{ route('index.index') }}">
                    <span class="text-light text-uppercase">Proiectus</span>
                </a>
            </li>
            <!-- Fin logo -->

            <!-- Item sidenav -->
            <!-- <li class="nav-item">
                <a href="">
                    <i class="material-icons text-light">dashboard</i>
                    <span class="text-light">Dashboard</span>
                </a>
            </li> -->
            <!-- Fin item sidenav -->

            <!-- Item sidenav -->
            <li class="nav-item">
                <a class="dropdown">
                    <i class="material-icons text-light">person</i>
                    <span class="text-light">Usuaris</span>
                    <i class="dropdown-ico material-icons text-light">keyboard_arrow_down</i>


                </a>


                <div class="sub-menu">
                    <!-- Inicio Submenu -->
                    <ul class="nav flex-column">
                        <!-- Submenu -->
                        <li class="nav-item">
                            <a href="{{ route('employee.index') }}">
                                <span class="text-light">Empleats</span>
                            </a>
                        </li>
                        <!-- Fin submenu -->

                        <!-- Submenu -->
                        <li class="nav-item">
                            <a href="{{ route('professors.index') }}">
                                <span class="text-light">Professors</span>
                            </a>
                        </li>
                        <!-- Fin submenu -->

                        <!-- Submenu -->
                        <li class="nav-item">
                            <a href="{{ route('students.index') }}">
                                <span class="text-light">Estudiants</span>
                            </a>
                        </li>
                        <!-- Fin submenu -->

                        <!-- Submenu -->
                        <li class="nav-item">
                            <a href="{{ route('managers.index') }}">
                                <span class="text-light">Gestors</span>
                            </a>
                        </li>
                        <!-- Fin submenu -->
                    </ul>
                </div>
            </li>
            <!-- Fin item sidenav -->

            <!-- Item sidenav -->
            <li class="nav-item">
                <a class="dropdown">
                    <i class="material-icons text-light">file_copy</i>
                    <span class="text-light">Propostes</span>
                    <i class="dropdown-ico material-icons text-light">keyboard_arrow_down</i>
                </a>

                <div class="sub-menu">
                  <ul class="nav flex-column">
                    <!-- Submenu -->
                    <li class="nav-item">
                        <a href="{{ route('proposals.index') }}">

                            <span class="text-light">Totes les Propostes</span>
                        </a>
                    </li>
                    <!-- Fin submenu -->

                    <!-- Submenu -->
                    <li class="nav-item">
                        <a href="{{ route('proposals.dashboard') }}">
                            <span class="text-light">Les meves Propostes</span>
                        </a>
                    </li>
                    <!-- Fin submenu -->
                  </ul>
                </div>

            </li>
            <!-- Fin item sidenav -->

            <!-- Item sidenav -->
            <li class="nav-item">
                <a class="dropdown">
                    <i class="material-icons text-light">assignment</i>
                    <span class="text-light">Projectes</span>
                    <i class="dropdown-ico material-icons text-light">keyboard_arrow_down</i>
                </a>

                <div class="sub-menu">
                    <ul class="nav flex-column">
                        <!-- Submenu -->
                        <li class="nav-item">
                            <a href="{{ route('projects.index') }}">
                                <span class="text-light">Gestió de projectes</span>
                            </a>
                        </li>
                        <!-- Fin submenu -->

                        <!-- Submenu -->
                        <li class="nav-item">
                            <a href="{{ route('projects.dashboard') }}">
                                <span class="text-light">Tots els projectes</span>
                            </a>
                        </li>
                        <!-- Fin submenu -->
                    </ul>
                </div>
            </li>
            <!-- Fin item sidenav -->
            <li class="nav-item">
              @if(Auth::guest())
              @else
              @if (Auth::user()->id_role == 1)
                <a class="dropdown">
                    <i class="material-icons text-light">group</i>
                    <span class="text-light">Entitats</span>
                    <i class="dropdown-ico material-icons text-light">keyboard_arrow_down</i>


                </a>


                <div class="sub-menu">
                    <!-- Inicio Submenu -->
                    <ul class="nav flex-column">
                        <!-- Submenu -->
                        <li class="nav-item">
                            <a href="{{ route('schools.index') }}">
                                <span class="text-light">Centres</span>
                            </a>
                        </li>
                        <!-- Fin submenu -->

                        <!-- Submenu -->
                        <li class="nav-item">
                            <a href="{{ route('companies.index') }}">
                                <span class="text-light">Empreses</span>
                            </a>
                        </li>
                        <!-- Fin submenu -->
                    </ul>
                </div>
                @endif
                @endif
            </li>
            <!-- Fin item sidenav -->


        </ul>
    </nav>
    <!-- Fin sidenav -->
    <!-- jj -->

    <!-- Inicio menu -->
    <nav id="top-menu" class="navbar2 navbar-expand-lg navbar-light fixed-top bg-white">
        <!-- Inicio toggle menu -->
        <div class="navbar-header">
            <i id="sidenav-toggle" class="material-icons">menu</i>
        <!-- Fin toggle menu -->

        <!-- Inicio elementos menu -->
        <ul class="navbar-nav">
            <!-- Elemento menu -->
            <li class="nav-item active">
                <a class="nav-link" class="text-ternari" href="{{ route('index.index') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <!-- Fin elemento menu -->
            <!-- Elemento menu -->
            @guest
            <li class="nav-item ml-3">
                <a type="button" class="btn btn-outline-primary"  href="{{ route('login') }}">Inicia sessió<span class="sr-only">(current)</span></a>
            </li>
            @else
            <li class="nav-item ml-3">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                   {{ Auth::user()->username }}
                </a>

                <!-- Desplegable con Logout -->
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            <!-- Fin elemento menu -->
            @endif

        </ul>
      </div>
        <!-- Fin elementos menu -->
    </nav>
    <!-- Fin menu -->
</div>
