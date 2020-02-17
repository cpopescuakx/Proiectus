@extends('layouts.default')
@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
	<strong>Error!</strong> Alguns camps són obligatoris!<br><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif @if(Session::has('success')) <div class="alert alert-info"> {{Session::get('success')}} </div> @endif
<div class="container mb-5">
	<form method="POST" action="update">
	{{ csrf_field() }}
	<div class="form-group">
			<h4><label cfor="exampleFormControlInput1">Modificar el post!</label></h4>
			<div class="form-group">
				<input name="title" type="text" class="form-control" placeholder="Titol del post" required value="{{$post->title}}">
			</div>
			<!-- Textarea de l'editor de text -->
			<div class="form-group">
				<textarea name="content" id=summernote>{{$post->content}}</textarea>
			</div>

			<!-- Script per a inicialitzar l'editor de text-->
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
		</div>
		<div class="form-group">
			<a class="btn btn-primary float-left" href="{{ url('blog', [$id_project]) }}"> Cancel·lar</a>
			<button type="submit" class="btn btn-primary float-right">Confirmar</button>
		</div>
	</form>
	<br>
</div>
@endsection
