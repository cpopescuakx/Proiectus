@extends('layouts.default')
@section('content')

@if (count($errors) > 0)

@endif @if(Session::has('success')) <div class="alert alert-info"> {{Session::get('success')}} </div> @endif
<!-- <div>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Projecte</a></li>
      <li class="breadcrumb-item"><a href="{{ URL::previous() }}">Blog</a></li>
      <li class="breadcrumb-item active" aria-current="page">Post</li>
    </ol>
  </nav>
</div> -->

<div class="formulari">
    <form class="was-validated" action="{{route('post.update', [$id_project, $post->id_post])}}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-10">
                <div class="container">
                    <div class="contact-image text-center mt-3">
                        <img class="form-img" src="{{ asset('img/icono_negro.png') }}" alt=""/>
                    </div>
                </div>
                <div class="container contact-form">
                    <div class="container">
                        <div class="row no-gutters justify-content-center mt-5">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <h1>Modificar el Post</h1>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 ">
                                <label for="nom">Títol</label>
                                <input type="text" name = "title" class="form-control" id="title" value="{{$post->title}}" required>
                                <div class="invalid-feedback">Camp necessari</div>
                            </div>
                        </div>
                    </div>
						<div class="form-group mt-4">
							<div class="row justify-content-center">
								<div class="col-10 col-sm-10 col-md-8 col-lg-8">
									<label for="nom">Contingut</label>
									<textarea name="content" id=summernote>{{$post->content}}</textarea>
								<div class="invalid-feedback">Camp necessari</div>
							</div>
						</div>
					</div>
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8">
                              <a class="btn btn-primary float-left" href="{{ URL::previous() }}"> Cancel·lar</a>
                                <button type="submit" name = "sbumit" class="btn btn-primary float-right">Modificar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@section('custom-scripts')
<script>
	$('#summernote').summernote({
		placeholder: 'Contingut del post',
		tabsize: 2,
		height: 100,
		minHeight: 100,
		maxHeight: 400
	});

	/* Comprovem si el contingut del post esta buit al fer submit i
			evitem continuar si està buit
	*/
	$('#postCreationForm').on('submit', function(e) {
		// Comprovem si el contingut del post esta buit
		if ($('#summernote').summernote('isEmpty')) {
			console.log('Introdueix el contingut del post!');
			// Evitar el submit
			e.preventDefault();
		}
	})
</script>
@endsection
@endsection
