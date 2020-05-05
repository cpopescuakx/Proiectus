@extends('layouts.default')
<title>Pàgina no trobada - 500</title>
@section('content')

<style>
.background {
  position: absolute;
      top: 0;
      left: 1;
      /* margin-left: 50%; */
      /* margin-right: auto; */
      width: 50%;
      height: 100%;
      background: url(https://gifimage.net/wp-content/uploads/2018/11/pokemon-pixel-art-gif-4.gif) 50% no-repeat;
      background-size: cover;
      z-index: -1;
      opacity: .5;
}

h1 {
  font-size: 10rem;
}
</style>

<div class="container">
  <div class="background">

  </div>
  <div class="row">
    <div class="col">
      <h1>500</h1>
      <h2>No hi ha res aquí...</h2>
      <h3>...Però potser <a href="{{route('faq.index')}}">aquí</a> si :)</h3>
    </div>
  </div>
</div>


@endsection
