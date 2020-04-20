@extends('layouts.default')
<title>Page not found - 404</title>
@section('content')

<style>
.background {
  position: absolute;
  top: 0;
  left: 1;
  margin-left: 80%;
  margin-right: auto;
  width: 10%;
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
<div class="background">

</div>
<div class="container">
  <div class="row">
    <div class="col">
      <h1>404</h1>
      <h2>No hi ha res aqui...</h2>
      <h3>...Pero potser <a href="{{route('faq.index')}}">aquí</a> si :)</h3>
    </div>
  </div>
</div>


@endsection
