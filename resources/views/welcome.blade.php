@extends('layouts.default_unlogged')

@section('content')
@mapstyles
<div id="app"></div>

    <main role="main">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide slide-width" src="img/carrusel0.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption">
                            <div class="row no-gutters">
                                <div id="photos">
                                </div>

                            </div>
                            <h1>Connecta.</h1>
                            <p>La teva empresa pot connectar amb centres educatius o viceversa <br> Proposa un
                                desafiament, forma el teu equip i desenvolupa un projecte.</p>
                            <p><a class="btn btn-lg btn-primary" href="register" role="button">Registra't</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="second-slide slide-width" src="img/carrusel1.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Per a les empreses.</h1>
                            <p>Podran connectar amb centres educatius que imparteixin graus mitjans o superiors <br> en
                                la seva àrea professional, col·laborar en projectes del seu interès o publicar
                                propostes.</p>
                            <p><a class="btn btn-lg btn-primary" href="#que_es_proiectus" role="button">Més info...</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="third-slide slide-width" src="img/carrusel2.jpg" alt="Professor donant classe">
                    <div class="container">

                        <div class="carousel-caption">
                            <h1>Per als centres educatius.</h1>
                            <p>Els alumnes podran accedir a experiències professionals <br>a través de la col·laboració
                                en projectes en el seu camp d'estudis.</p>
                            <p><a class="btn btn-lg btn-primary" href="#que_es_proiectus" role="button">Més info...</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="container pt-3 pb-4"></div>
        <!-- Wrap the rest of the page in another container to center all the content. -->
        <div class="container py-4">
            <section id="que_es_proiectus">
                <div class="pricing-header px-3 py-5 pt-5 pb-5 mx-auto text-center">
                    <h2 class="display-4 font-weight-bold">Què és Proiectus?</h2>
                </div>
                <div class="row featurette">
                    <div class="col-md-7">
                        <p class="lead"><b>Proiectus</b> és la solució per a poder connectar empreses i instituts. </p>
                        <p class="lead"> Per a fer-ho, hem fet una aplicació web que permet connectar-los mitjançant
                            propostes a les
                            quals es poden afegir empreses o instituts que tinguin la mateixa necessitat. </p>
                        <p class="lead">Un cop les entitats s’afegeixen, es crea un projecte, on dins d’aquest, totes
                            dues parts poden
                            comunicar-se mitjançant el xat, compartir fitxers o crear posts per a dur a terme la tasca
                            que s’ha proposat.</p>
                    </div>

                    <div class="col-md-4 offset-md-1">
                        <img class="featurette-image img-fluid mx-auto" src="img/que_es_proiectus.jpg" alt="">
                    </div>
                </div>
                <hr class="featurette-divider">
        </div><!-- /.container -->
        </section>

        <section id="com_funciona">
            <div class="container mt-5">
                <div class="pricing-header px-3 py-5 pt-md-5 pb-md-4 mx-auto text-center">
                    <h1 class="display-4 font-weight-bold">Com funciona?</h1>
                </div>
            </div>

            <div class="container my-5">
                <!-- 4 columnas de texto luego de qué es proiectus-->
                <div class="row">
                    <div class="col-lg-3 text-center mx-auto ">
                        <img class="rounded-circle" src="img/pruebaa.jpg" alt="" width="140" height="140">
                        <h3 class="pt-2">Registra't</h3>
                        <p class="pl-4 pr-4">Si vols col·laborar en PROIECTUS.cat com a empresa o centre educatiu,
                            registra't!</p>
                    </div><!-- /.col-lg-3 -->

                    <div class="col-lg-3 text-center mx-auto">
                        <img class="rounded-circle" src="img/pruebab.jpg" alt="" width="140" height="140">
                        <h3 class="pt-2">Proposa</h3>
                        <p class="pl-4 pr-4">Crea una proposta d'un projecte perquè un centre/empresa vulgui col·laborar
                            amb tu!</p>
                    </div><!-- /.col-lg-3 -->

                    <div class="col-lg-3 text-center mx-auto">
                        <img class="rounded-circle" src="img/pruebac.jpg" alt="" width="140" height="140">
                        <h3 class="pt-2">Match!</h3>
                        <p class="pl-4 pr-4">Quan un centre/empresa s'interessa en la teva proposta comença el teu
                            projecte!</p>
                    </div><!-- /.col-lg-3-->

                    <div class="col-lg-3 text-center mx-auto mb-5">
                        <img class="rounded-circle" src="img/pruebad.jpg" alt="" width="140" height="140">
                        <h3 class="pt-2">Segueix</h3>
                        <p class="pl-4 pr-4">Els avenços del projecte, comparteix documents i missatges amb tots els
                            col·laboradors!</p>
                    </div><!-- /.col-lg-3 -->

                </div><!-- /.row -->

            </div><!-- /.container -->
            <!-- On ens pots trobar -->
            <div class="container py-4">
                <section id="On_ens_pots_trobar">
                    <div class="pricing-header mx-auto text-center pr-4">
                        <h2 class="display-4 font-weight-bold">On ens pots trobar ?</h2>
                    </div>
                    <div class="container mt-5">
                        <div class="row featurette justify-content-center pl-5">
                            <style>
                                /* Always set the map height explicitly to define the size of the div
                         * element that contains the map. */
                                #map {
                                    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);

                                    height: 400px;
                                    width: auto;

                                }

                                /* @media (max-width: 600px) {
                            .col-md-8 {
                              margin-right: 200px;
                            }
                          } */

                            </style>



                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div id="map" title="Mapa"></div>
                                    </div>
                                    <div class="col">
                                        <h2 class="pt-2">Empreses</h2>
                                        <div class="btn-group d-flex flex-wrap">

                                            <img src="{{ asset('img/logo_consellcomarcal2.png') }}"
                                                class="img-fluid" id="logo_e2" style="cursor:pointer"
                                                alt="logo consell comarcal">


                                        </div>
                                    </div>
                                    <div class="col">
                                        <h2 class="pt-2">Instituts</h2>
                                        <div class="btn-group d-flex flex-wrap">
                                            <img src="{{ asset('img/logo_iesmontsia.png') }}"
                                                class="img-fluid" id="logo_i1" style="cursor:pointer">
                                            <img src="{{ asset('img/logo_ramonberenguer.jpg') }}"
                                                class="img-fluid" id="logo_i2" style="cursor:pointer">



                                        </div>
                                    </div>
                                </div>

                            </div>


                            <script>
                                // Variable que crea lobjecte mapa
                                var map;
                                // Variables per als marcadors al mapa
                                var iesMontsia = {
                                    lat: 40.709150,
                                    lng: 0.582557
                                };
                                var iesRamonBerenguer = {
                                    lat: 40.709906,
                                    lng: 0.581389
                                };
                                var consellComarcal = {
                                    lat: 40.714371,
                                    lng: 0.579832
                                };
                                // Funcio que crida l'objecte del mapa "google.maps.Map"
                                function initMap() {
                                    map = new google.maps.Map(document.getElementById('map'), {
                                        center: new google.maps.LatLng(iesMontsia),
                                        zoom: 17
                                    });

                                    function newLocation(newLat, newLng) {
                                        map.setCenter({
                                            lat: newLat,
                                            lng: newLng
                                        });
                                    }
                                    google.maps.event.addDomListener(window, 'load', initMap);

                                    // Diferents marcadors
                                    var marker1 = new google.maps.Marker({
                                        position: iesMontsia,
                                        map: map,
                                        title: 'IES Montsià SC.'
                                    });
                                    var marker2 = new google.maps.Marker({
                                        position: consellComarcal,
                                        map: map,
                                        title: 'Consell Comarcal CO.'
                                    });

                                    var marker4 = new google.maps.Marker({
                                        position: iesRamonBerenguer,
                                        map: map,
                                        title: 'Ies Ramon Berenguer IV SC.'
                                    });
                                }



                                //Establir localitzacio amb jquery
                                $(document).ready(function () {
                                    $("#logo_e1").on('click', function () {
                                        map.setCenter(new google.maps.LatLng(40.701968, 0.560683));
                                    });

                                    $("#logo_e2").on('click', function () {
                                        map.setCenter(new google.maps.LatLng(40.714371, 0.579832));
                                    });

                                    $("#logo_i1").on('click', function () {
                                        map.setCenter(new google.maps.LatLng(iesMontsia));
                                    });
                                    $("#logo_i2").on('click', function () {
                                        map.setCenter(new google.maps.LatLng(iesRamonBerenguer));
                                    });
                                });

                            </script>



                        </div>

                    </div><!-- /.container -->

            </div>
            <hr class="featurette-divider">



        </section>

        
        <section id="sponsors_proiectus">
            <div class="container py-4">
                <div class="pricing-header px-3 py-5 pt-5 pb-5 mx-auto text-center">
                    <h2 class="display-4 font-weight-bold">Col·laboradors</h2>
                </div>
            </div>
        </section>

        <div class="container">
            <section class="customer-logos slider">
                <div class="slide"><img src="{{ asset('img/logo-akx.png') }}" alt="3"></div>
                <div class="slide"><img src="{{ asset('img/logo_generalitat.png') }}" alt="2"></div>
                <div class="slide"><img src="{{ asset('img/logo-captio.png') }}" alt="4"></div>
                <div class="slide"><img src="{{ asset('img/logo_iesmontsia.png') }}" alt="5"></div>
                <div class="slide"><img src="{{ asset('img/logo-nath.png') }}" alt="7"></div>
                <div class="slide"><img src="{{ asset('img/logo_creacio.png') }}" alt="7"></div>
                <div class="slide"><img src="{{ asset('img/logo_consellcomarcal2.png') }}" alt="7"></div>
                <div class="slide"><img src="{{ asset('img/logo-disi.png') }}" alt="7"></div>
            </section>
        </div>




        </div><!-- /.fin main container -->


        @mapscripts
        @endsection
