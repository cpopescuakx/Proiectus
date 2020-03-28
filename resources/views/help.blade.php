@extends('layouts.default')
@inject('controller', 'App\Http\Controllers\UserController')
@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/components/g2/g2_style.css')}}">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="column mt-4 mb-4">
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
        <div id="gestor" class="tabcontent mt-3">
            <h2 class="mt-3 justify-content-center"><strong>Gestió Gestors</strong></h2>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/zD7I-GbjJ_w" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>

    <div class="row justify-content-center">
        <div id="wiki_blog" class="tabcontent mt-3">
            <h2 class="mt-3"><strong>Gestió wiki i blog</strong></h2>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/zD7I-GbjJ_w" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
