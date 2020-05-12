@extends('layouts.default')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/components/g2/g2_style.scss')}}">
<?php $i = 1 ?>

<div class="pt-2">
    <h1 class="text-center">Rànquing de centres</h1>
</div>

<div class="container-fluid pt-4">

    @foreach ($instituts as $institut)

        <div class="container border border-dark rounded mt-2">
            <div class="row w-100">

                @if ($i == 1)

                    <div class="col-2 d-flex justify-content-center float-sm-left mt-2 pt-3">
                        <h2 class="gold mr-4 font-weight-bold">#{{$i}}</h2>
                    </div>

                    
                @elseif ($i == 2)
                            
                    <div class="col-2 d-flex justify-content-center float-sm-left mt-2 pt-3">
                        <h2 class="silver mr-4 font-weight-bold">#{{$i}}</h2>
                    </div>

                @elseif($i == 3)  

                    <div class="col-2 d-flex justify-content-center float-sm-left mt-2 pt-3">
                        <h2 class="bronze mr-4 font-weight-bold">#{{$i}}</h2>
                    </div>

                @else

                    <div class="col-2 d-flex justify-content-center float-sm-left mt-3 pt-3">
                        <h4 class="mr-4">#{{$i}}</h4>
                    </div>

                @endif

                <div class="col-7 d-flex justify-content-center mt-2 pt-3">
                    <h3 class="font-weight-light text-uppercase ml-4">{{$institut->name}}</h3>
                </div>

                <div class="col w-100 mt-2 pt-2 mb-1">
                    <h5 class="text-center text-muted">{{$institut->quantitat}}</h5>
                    <h5 class="text-center text-uppercase text-muted">propostes creades</h5>
                </div>
            </div>
        </div>

        <?php $i++ ?>
        
    @endforeach

</div>

@stop