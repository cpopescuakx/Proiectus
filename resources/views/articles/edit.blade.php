@extends('layouts.default')

@section('content')
    <div class="formulari">
        <form class="was-validated" action="{{route('article.update', [$article->id_project, $article->id_article])}}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-10">
                    <div class="container">
                        <div class="contact-image text-center mt-3">
                            <img class="form-img" src="{{ asset('img/icono_negro.png') }}" />
                        </div>
                    </div>
                    <div class="container contact-form">
                        <div class="container">
                            <div class="row no-gutters justify-content-center mt-5">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <h1>Modificar Article</h1>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="nom">Titol</label>
                                    <input type="text" name = "title" class="form-control" value="{{ $article->title }}" required>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <label for="nom">Contingut</label>
                                    <textarea name="content" id=summernote>{{$article->content}}</textarea>
                                    <div class="invalid-feedback">Camp necessari</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <button type="submit" name = "sbumit" class="btn btn-primary float-right">Modificar</button>
                                    <!-- <a style="margin-right: 10px" class="btn btn-primary float-right" href="{{route ('wiki.index',[$id_project])}}">Enrere</a> -->
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
		minHeight: 200,
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
