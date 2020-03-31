@extends('layouts.default_unlogged')

@section('content')
@mapstyles

    <main role="main">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide slide-width" src="img/carrusel0.jpg" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>Connecta.</h1>
                            <p>La teva empresa pot connectar amb centres educatius o viceversa <br> Proposa un desafiament, forma el teu equip i desenvolupa un projecte.</p>
                            <p><a class="btn btn-lg btn-primary" href="g1_formRegCentreEntitat.php" role="button">Registra't</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="second-slide slide-width" src="img/carrusel1.jpg" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Per a les empreses.</h1>
                            <p>Podran connectar amb centres educatius que imparteixin graus mitjans o superiors <br> en la seva àrea professional, col·laborar en projectes del seu interès o publicar propostes.</p>
                            <p><a class="btn btn-lg btn-primary" href="#que_es_proiectus" role="button">Més info...</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="third-slide slide-width" src="img/carrusel2.jpg" alt="Third slide">
                    <div class="container">

                        <div class="carousel-caption text-left">
                          <iframe title="Vue.js Documental" width="560" height="330" src="https://www.youtube.com/embed/OrxmtDw4pVI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <h1>Per als centres educatius.</h1>
                            <p>Els alumnes podran accedir a experiències professionals <br>a través de la col·laboració en projectes en el seu camp d'estudis.</p>
                            <p>
                                <a type="button" class="btn btn-lg btn-primary video-btn" href="#" data-toggle="modal" data-src="https://www.youtube.com/watch?v=2rpfqwCk9Sk" data-target="#myModal" role="button">Veure vídeo</a>
                            </p>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-body">

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                        <!-- 16:9 aspect ratio -->
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
                                        </div>

                                    </div>

                                </div>
                            </div>
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
                        <h2 class="featurette-heading">Segur que vols saber més <span class="text-muted">...Ara t'ho direm!</span></h2>
                        <p class="lead">Aquest és un text simulat per a la presentacio de Proiectus.cat en principi no ha de ser tan llarg, ha de ser prou atractiu perquè instituts i empreses vulguin apuntar-se i ser part de la comunitat Proiectus.</p>
                        <p class="lead">Aquest és un text simulat per a la presentacio de Proiectus.cat en principi no ha de ser tan llarg, ha de ser prou atractiu perquè instituts i empreses vulguin apuntar-se i ser part de la comunitat Proiectus.</p>
                        <p class="lead">Aquest és un text simulat per a la presentacio de Proiectus.cat en principi no ha de ser tan llarg.</p>
                        <p class="lead">Tenim una gran tasca per fidelitzar usuaris!</p>
                    </div>

                    <div class="col-md-4 offset-md-1">
                        <img class="featurette-image img-fluid mx-auto" src="img/que_es_proiectus.jpg" alt="proiectus">
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
                        <img class="rounded-circle" src="img/pruebaa.jpg" alt="com funciona" width="140" height="140">
                        <h3 class="pt-2">Registra't</h3>
                        <p class="pl-4 pr-4">Si vols col·laborar en PROIECTUS.cat com a empresa o centre educatiu, registra't!</p>
                    </div><!-- /.col-lg-3 -->

                    <div class="col-lg-3 text-center mx-auto">
                        <img class="rounded-circle" src="img/pruebab.jpg" alt="Generic placeholder image" width="140" height="140">
                        <h3 class="pt-2">Proposa</h3>
                        <p class="pl-4 pr-4">Crea una proposta d'un projecte perquè un centre/empresa vulgui col·laborar amb tu!</p>
                    </div><!-- /.col-lg-3 -->

                    <div class="col-lg-3 text-center mx-auto">
                        <img class="rounded-circle" src="img/pruebac.jpg" alt="Generic placeholder image" width="140" height="140">
                        <h3 class="pt-2">Match!</h3>
                        <p class="pl-4 pr-4">Quan un centre/empresa s'interessa en la teva proposta comença el teu projecte!</p>
                    </div><!-- /.col-lg-3-->

                    <div class="col-lg-3 text-center mx-auto mb-5">
                        <img class="rounded-circle" src="img/pruebad.jpg" alt="Generic placeholder image" width="140" height="140">
                        <h3 class="pt-2">Segueix</h3>
                        <p class="pl-4 pr-4">Els avenços del projecte, comparteix documents i missatges amb tots els col·laboradors!</p>
                    </div><!-- /.col-lg-3 -->

                </div><!-- /.row -->

            </div><!-- /.container -->
            <!-- On ens pots trobar -->
            <div class="container py-4">
                <section id="que_es_proiectus">
                    <div class="pricing-header mx-auto text-center pr-4">
                        <h2 class="display-4 font-weight-bold">On ens pots trobar ?</h2>
                    </div>
                    <div class="container mt-5">
                      <div class="row featurette justify-content-center pl-5">
                          <div class="col-md-7">


                                <style>
                                /* Always set the map height explicitly to define the size of the div
                                 * element that contains the map. */
                                #map {
                                  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);

                                  height: 400px;
                                  width: 530px;
                                }


                              </style>

                              <div id="map" title="Mapa"></div>
                              <div id="infowindow-content">
                                <img src="" width="16" height="16" id="place-icon">
                                <span id="place-name"  class="title"></span><br>
                                <span id="place-address"></span>
                              </div>
                            </div>
                            <div class="col-md-2 ">
                              <h2 class="pt-2">Empreses</h2>
                              <div class="btn-group d-flex flex-wrap">
                                <img src="{{ asset('img/Icono_1.png') }}"class="img-thumbnail "id="logo_e1"style="cursor:pointer">
                                <img src="{{ asset('img/logo_consellcomarcal.png') }}"class="img-thumbnail"id="logo_e2"style="cursor:pointer">


                              </div>
                            </div>

                                <div class="col-md-2 "style="height: 500px;">
                                  <h2 class="pt-2">Instituts</h2>
                                  <div class="btn-group d-flex flex-wrap">
                                    <img src="{{ asset('img/logo_iesmontsia.png') }}"class="img-thumbnail img-fluid" id="logo_i1"style="cursor:pointer">
                                    <img src="{{ asset('img/logo_ramonberenguer.jpg') }}"class="img-thumbnail img-fluid"id="logo_i2"style="cursor:pointer">



                                  </div>
                                </div>


                            <script>
                              // Variable que crea lobjecte mapa
                              var map;
                              // Variables per als marcadors al mapa
                              var proiectusCO = {lat:40.701968, lng:0.560683};
                              var iesMontsia = {lat:40.709150, lng: 0.582557};
                              var iesRamonBerenguer = {lat:40.709906, lng:0.581389};
                              var consellComarcal = {lat:40.714371, lng: 0.579832};
                              var hospitalAmposta = {lat: 40.708930, lng: 0.575960};
                              // Funcio que crida l'objecte del mapa "google.maps.Map"
                              function initMap() {
                                map = new google.maps.Map(document.getElementById('map'), {
                                  center: new google.maps.LatLng(proiectusCO),
                                  zoom: 17
                                });
                                function newLocation(newLat,newLng)
                                  {
                                  	map.setCenter({
                                  		lat : newLat,
                                  		lng : newLng
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
                                var marker3 = new google.maps.Marker({
                                  position: hospitalAmposta,
                                  map: map,
                                  title: 'Hospital Amposta CO.'
                                });
                                var marker4 = new google.maps.Marker({
                                  position: proiectusCO,
                                  map: map,
                                  title: 'Sede Proiectus CO.'
                                });
                                var marker4 = new google.maps.Marker({
                                  position: iesRamonBerenguer,
                                  map: map,
                                  title: 'Ies Ramon Berenguer IV SC.'
                                });
                              }



                                //Setting Location with jQuery
                                $(document).ready(function ()
                                {
                                    $("#logo_e1").on('click', function ()
                                    {
                                	      map.setCenter(new google.maps.LatLng(40.701968,0.560683));
                                	});

                                	$("#logo_e2").on('click', function ()
                                    {
                                	   map.setCenter(new google.maps.LatLng(40.714371,0.579832));
                                	});

                                    $("#logo_i1").on('click', function ()
                                    {
                                	   map.setCenter(new google.maps.LatLng(iesMontsia));
                                	});
                                  $("#logo_i2").on('click', function ()
                                  {
                                   map.setCenter(new google.maps.LatLng(iesRamonBerenguer));
                                });
                                });
                            </script>




                      </div>
              </div><!-- /.container -->
                    </div>


        </section>



        </div><!-- /.fin main container -->


@mapscripts
@endsection
