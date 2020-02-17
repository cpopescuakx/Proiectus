@extends('layouts.default')

@section('content')
  
    <link rel="stylesheet" type="text/css" href="{{asset('css/components/g2/g2_style.css')}}">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="column mt-4 mb-4">
                <h1>{{$project->name}}</h1>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="tab">
            <button class="mr-1 tablinks active" onclick="tabs(event, 'info')"><i data-toggle="tooltip" title="Informació" class="boto btn fas fa-info fa-lg"></i></button>
            <button class="mr-1 tablinks" onclick="tabs(event, 'gest')"><i data-toggle="tooltip" title="Gestor documental" class="boto btn fas fa-folder-open fa-lg"></i></button>
            <button class="mr-1 tablinks" onclick="tabs(event, 'wiki')"><i data-toggle="tooltip" title="Wikipedia" class="boto btn fab fa-wikipedia-w fa-lg"></i></button>
            <button class="mr-1 tablinks" onclick="tabs(event, 'blog')"><i data-toggle="tooltip" title="Blog" class="boto btn fas fa-rss fa-lg"></i></button>
            <button class="mr-1 tablinks" onclick="tabs(event, 'participants')"><i data-toggle="tooltip" title="Participants" class="boto btn fas fa-users fa-lg"></i></button>
            <button class="mr-1 tablinks" onclick="tabs(event, 'xat')"><i onclick="tabs(5)" id = "btn-xat" data-toggle="tooltip" title="Xat" class="boto btn fas fa-comments fa-lg"></i></button>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div id="info" class="tabcontent mt-3">
            <h2><strong>Descripció<strong></h2>
            <p>{{$project->description}}</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div id="gest" class="tabcontent mt-3">
            <h2><strong>Gestor documental<strong></h2>
            
        </div>
    </div>

    <div class="row justify-content-center">
        <div id="wiki" class="tabcontent mt-3">
            <h2><strong>Wiki<strong></h2>
            
        </div>
    </div>

    <div class="row justify-content-center">
        <div id="blog" class="tabcontent mt-3">
            <h2><strong>Blog<strong></h2>
            
        </div>
    </div>

    <div class="row justify-content-center">
        <div id="participants" class="tabcontent mt-3">
            <h2><strong>Participants<strong></h2>
            
        </div>
    </div>

    <div class="row justify-content-center">
        <div id="xat" class="tabcontent mt-3">
            <h2><strong>Xat<strong></h2>
            
        </div>
    </div>

    

    <script>
        document.getElementById('info').style.display="block";
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
