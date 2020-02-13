
<div id="menu" class="closed">
    <!-- Inicio sidenav -->
    <nav id="sidenav" class="bg-primary1">
        <ul class="nav flex-column">
            <!-- Logo -->
            <li class="nav-item">
                <a class="navbar-brand" href="">
                    <img src="{{ asset('img/icono_light.png') }}" width="30" height="30" class="d-inline-block align-top" alt="" href="index.php">
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
                            <a href="">
                                <span class="text-light">Empleats</span>
                            </a>
                        </li>
                        <!-- Fin submenu -->

                        <!-- Submenu -->
                        <li class="nav-item">
                            <a href="">
                                <span class="text-light">Professors</span>
                            </a>
                        </li>
                        <!-- Fin submenu -->

                        <!-- Submenu -->
                        <li class="nav-item">
                            <a href="">
                                <span class="text-light">Estudiants</span>
                            </a>
                        </li>
                        <!-- Fin submenu -->

                        <!-- Submenu -->
                        <li class="nav-item">
                            <a href="">
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
                    <span class="text-light">Proposals</span>
                    <i class="dropdown-ico material-icons text-light">keyboard_arrow_down</i>
                </a>

                <div class="sub-menu">
                  <ul class="nav flex-column">
                    <!-- Submenu -->
                    <li class="nav-item">
                        <a href="{{ url('/Proposals') }}">

                            <span class="text-light">All Proposals</span>
                        </a>
                    </li>
                    <!-- Fin submenu -->

                    <!-- Submenu -->
                    <li class="nav-item">
                        <a href="">
                            <span class="text-light">My Proposals</span>
                        </a>
                    </li>
                    <!-- Fin submenu -->
                  </ul>
                </div>

            </li>
            <!-- Fin item sidenav -->

            <!-- Item sidenav -->
            <li class="nav-item">
                <a href="g2_llistar_projectes.php">
                    <i class="material-icons text-light">assignment</i>
                    <span class="text-light">Projects</span>
                </a>
            </li>
            <!-- Fin item sidenav -->

        </ul>
    </nav>
    <!-- Fin sidenav -->

    <!-- Inicio menu -->
    <nav id="top-menu" class="navbar2 navbar-expand-lg navbar-light fixed-top bg-white">
        <!-- Inicio toggle menu -->
        <div class="navbar-header">
            <i id="sidenav-toggle" class="material-icons">menu</i>
        </div>
        <!-- Fin toggle menu -->

        <!-- Inicio elementos menu -->
        <ul class="navbar-nav">
            <!-- Elemento menu -->
            <li class="nav-item active">
                <a class="nav-link" class="text-ternari" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <!-- Fin elemento menu -->

            <!-- Elemento menu -->
            <li class="nav-item">
                <a class="nav-link" href="">Features</a>
            </li>
            <!-- Fin elemento menu -->
        </ul>
        <!-- Fin elementos menu -->
    </nav>
    <!-- Fin menu -->
</div>
