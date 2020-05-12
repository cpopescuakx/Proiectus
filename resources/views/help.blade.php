@extends('layouts.default')
@inject('controller', 'App\Http\Controllers\UserController')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/components/g2/g2_style.css')}}">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="column mt-4 mb-4"><br>
                <h1 class="display-4">Tutorials d'ajuda</h1>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="tab">
            <button class="mr-1 tablinks active" onclick="tabs(event, 'gestor')"><i data-toggle="tooltip" title="Gestió de gestors" class="boto btn fas fa-users fa-lg"></i></button>
            <button class="mr-1 tablinks" onclick="tabs(event, 'wiki_blog')"><i data-toggle="tooltip" title="Gestió de blog i wiki" class="boto btn fab fa-wikipedia-w fa-lg"></i></button>
           <!--  <button class="mr-1 tablinks" onclick="tabs(event, 'res')"><i data-toggle="tooltip" title="Centre de recursos" class="boto btn fas fa-file fa-lg"></i></button>
            <button class="mr-1 tablinks" onclick="tabs(event, 'wiki')"><i data-toggle="tooltip" title="Wikipedia" class="boto btn fab fa-wikipedia-w fa-lg"></i></button>
            <button class="mr-1 tablinks" onclick="tabs(event, 'blog')"><i data-toggle="tooltip" title="Blog" class="boto btn fas fa-rss fa-lg"></i></button>
            <button class="mr-1 tablinks" onclick="tabs(event, 'participants')"><i data-toggle="tooltip" title="Participants" class="boto btn fas fa-users fa-lg"></i></button>
            <button class="mr-1 tablinks" onclick="tabs(event, 'xat')"><i onclick="tabs(5)" id = "btn-xat" data-toggle="tooltip" title="Xat" class="boto btn fas fa-comments fa-lg"></i></button> -->
        </div>
    </div>

    <div class="row justify-content-center">
        <div id="gestor" class="tabcontent mt-3 col-md 6">
            <h2 class="mt-3 justify-content-center"><strong>Gestió Gestors</strong></h2>
            <div class="progress-container col-md-6">
              <div class="progress-bar" id="myBar"></div>
              <iframe title="gestor" width="560" height="315" src="https://www.youtube.com/embed/exQfi015i4o" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              <br><a target="_blank" href="https://www.youtube.com/watch?v=exQfi015i4o&feature=emb_title"><u>Enllaç al vídeo</u></a>
            </div>
          <div class="content col-md-6">
          <h4>Transcipció</h4>
            <p><b>Didac</b>: Per a realitzar la gestió de <b>gestors</b>, accedim a aquest.</p>
            <p><b>[Pausa per accedir als gestors]</b></p>
          <p><b>Didac</b>: Un cop dintre, com podem observar hi ha un llistat dels <b>gestors</b>. Ara crearem un gestor i per a fer-ho anirem a l'icona de <b>crear</b>.</p>
          <p><b>[Pausa per accedir a l'apartat de creació]</b></p>
          <p><b>Didac</b>: Per a poder crear el gestor haurem d'emplenar tots els <b>camps</b>. Un cop realitzat clicarem <b>crear</b>.</p>
          <p><b>[Pausa per a tornar a llistar tots els gestors]</b></p>
          <h5> Audio descripció per a cegs </h5>
          <audio controls>
            <source src="explicacio_gestors.ogg" type="audio/ogg">
              <source src="explicacio_gestors.mp3" type="audio/mpeg">
          </audio>
        </div>
            <style>
            .progress-container {
              width: 100%;
              height: 8px;
            }
            .content {
              margin: 10px auto 0 auto;
              width: 80%;
            }
            </style>
            </br>
        </div>
    </div>



    <div class="row justify-content-center">
        <div id="wiki_blog" class="tabcontent mt-3 col-md 6">
            <h2 class="mt-3 justify-content-center"><strong>Gestió wiki i blog</strong></h2>
            <div class="progress-container col-md-6">
              <div class="progress-bar" id="myBar"></div>
              <iframe title="wiki_blog" width="560" height="315" src="https://www.youtube.com/embed/zD7I-GbjJ_w" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <br><a target="_blank" href="https://www.youtube.com/watch?v=zD7I-GbjJ_w&feature=emb_title"><u>Enllaç al vídeo</u></a>

            </div>
              <div class="content col-md-6">
              <h4>Transcipció</h4>
              <p><b>Josep</b>: Per a realitzar la gestió de <b>blogs</b> i <b>wiki</b> d'un projecte, accedim a aquest.</p>
              <p><b>[Pausa per accedir al projecte]</b></p>
              <p><b>Josep</b>: Un cop dintre, com podem observar hi ha un seguit d'<b>icones</b>, les quals accedirem a l'apartat de la <b>wikipedia</b>.</p>
              <p><b>[Pausa per accedir a l'apartat de wikipedia]</b></p>
              <p><b>Josep</b>: En aquest com podem observar hi ha el <b>nom</b> de la wikipedia, el qual podem editar fent click a l'icona del <b>llapís</b>, i a més a més hi ha l'opció per a crear un <b>article</b>, on afegirem el <b>títol</b> i la <b>descripció</b> d'aquest. També podem <b>llistar</b> els existents, <b>eliminar</b> i <b>editar</b>.</p>
              <p><b>[Pausa per a indicar les icones d'eliminar i editar]</b></p>
              <h5> Audio descripció per a cegs </h5>
              <audio controls>
                <source src="gestio_wiki_blog.ogg" type="audio/ogg">
                <source src="gestio_wiki_blog.mp3" type="audio/mpeg">
                El teu navegador no soporta aquest audio.
              </audio>
            </div>
                <style>
                .progress-container {
                  width: 100%;
                  height: 8px;
                }
                .content {
                  margin: 10px auto 0 auto;
                  width: 80%;
                }
                </style>
        </div>
    </div>


    <script>
        document.getElementById('gestor').style.display="block";
        function tabs(evt, apartat) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(apartat).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
@stop
