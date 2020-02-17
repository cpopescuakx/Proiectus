@extends('layouts.default')

@section('content')
  
    <link rel="stylesheet" type="text/css" href="{{asset('css/components/g2/g2_style.css')}}">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="column mt-4 mb-4">
                <h1>{{$proposal->name}}</h1>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div id="info" class="tabcontent mt-3">
            <h2><strong>Descripció<strong></h2>
            <p>{{$proposal->description}}</p>
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
