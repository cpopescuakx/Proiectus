<!-- Inicio footer -->
<div class="closed w-100 pt-4 pt-md-5 border-top fondo-footer">
    <!-- Inicio contenedor -->
    <div class="container">
        <!-- Inicio filas -->
        <div class="row">
            <!-- Inicio columna de 6 -->
            <div class="col-6 col-md">
                <!-- Titulo columna -->
                <h5>Sobre Proiectus</h5>

                <!-- Elementos -->
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="{{route('index.index')}}#que_es_proiectus">Què és?</a></li>
                    <li><a class="text-muted" href="{{route('index.index')}}#com_funciona">Com funciona?</a></li>
                </ul>
            </div>
            <!-- Fin columna de 6 -->

            <!-- Inicio columna de 6 -->
            <div class="col-6 col-md">
                <!-- Titulo columna -->
                <h5>FAQ</h5>

                <!-- Elementos -->
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="{{ route('faq.index') }}">FAQ</a></li>
                </ul>
            </div>
            <!-- Fin columna de 6 -->

            <!-- Inicio columna de 6 -->
            <div class="col-6 col-md">
                <!-- Titulo columna -->
                <h5>Info</h5>

                <!-- Elementos -->
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Equip</a></li>
                    <li><a class="text-muted" href="#">Ubicació</a></li>
                </ul>
            </div>
            <!-- Fin columna de 6 -->

            <!-- Inicio columna de 6 -->
            <div class="col-6 col-md">
                <!-- Titulo columna -->
                <h5>Ajuda</h5>

                <!-- Elementos -->
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="{{ route('help.index') }}">Gestió Wiki i Blog</a></li>
                    <li><a class="text-muted" href="{{ route('help.index') }}">Gestió Gestors</a></li>
                    <li><a class="text-muted" href="{{ route('feed.feed') }}">Feed RSS</a></li>

                </ul>
            </div>
            <!-- Fin columna de 6 -->

            <!-- Inicio columna de 6 -->
            <div class="col-6 col-md">
                <!-- Titulo columna -->
                <h5>Legal</h5>

                <!-- Elementos -->
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="{{route('privacyAndCookies')}}">Privacitat i cookies</a></li>
                    <li><a class="text-muted" href="#">Termes i condicions</a></li>

                </ul>
            </div>
            <!-- Fin columna de 6 -->

        </div>
        <!-- Fin filas -->
    </div>
    <!-- Fin contenedor -->

    <!-- Borde gris -->
    <div class="border-bottom pb-5-md "></div>

    <!-- Inicio container -->
    <div class="container">
        <!-- Inicio fila -->
        <div class="row">
            <!-- Inicio columna -->
            <div class="col-6 col-md pt-3">
                <img class="mb-2" src="{{ asset('img/icono_negro.png') }}" alt="" width="40px" height="40px">
                <small class="d-block mb-3 text-muted">&copy; 2019-2020</small>
            </div>
            <!-- Fin columna -->

            <!-- Inicio columna rrss -->
            <div class="col-6 col-md pt-3">
                <div class="social_icon2">
                    <ul>
                        <li><a href="https://www.facebook.com/proiectus.proiectus.5" target="_blank" class="gap facebook"><i class="fab fa-facebook" aria-hidden="true"></i>Facebook</a> </li>
                        <li><a href="https://twitter.com/proiectus_cm" target="_blank" class="gap twitter"><i class="fab fa-twitter" aria-hidden="true"></i>twitter</a> </li>
                        <li><a href="#" target="_blank" class="gap google"><i class="fab fa-google-plus" aria-hidden="true"></i>google</a> </li>
                    </ul>
                </div>
            </div>
            <!-- Fin columna rrss -->
        </div>
        <!-- Fin filas -->
    </div>
    <!-- Fin contenedor -->
</div>
<!-- Fin footer -->
