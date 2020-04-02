
<link rel="stylesheet" type="text/css" href="{{asset('css/components/g1/g1_styles.css')}}">

@if(Auth::guest())
    <div class="text-center row justify-content-md-center">
        <div class="alert alert-danger mt-4 w-50" role="alert">
            <i class="fas fa-exclamation-circle fa-2x mr-3"></i>
            <h4 class="d-inline">Has d'<a href="{{ route ('login') }}">iniciar sessió</a>!</h4> 
        </div>
    </div>

@else

{{-- ESPAI PER A PENJAR FITXERS --}}

@if (Auth::user()->id_role == 2 || Auth::user()->id_role == 4 || Auth::user()->id_role == 5 || Auth::user()->id_role == 1) 
<h4 class="text-center pb-4 pt-4">Selecciona o arrastra els fitxers</h4>
<div class="w-100">

    <form action="{{route('resource.upload', compact('id_project', $id_project))}}" enctype="multipart/form-data" method="post">
        @csrf
        
        <div class="form-group resource-center w-100"> 
            <input required type="file" class="form-control" name="resources[]" multiple>
        </div>
        <div class="text-center">
            <button style="color: white;" type="submit" class="btn bg-primary1 w-100 mb-4">Pujar</button>
        </div>
    </form> 
@endif

    @if(count($resources) > 0) {{-- Si hi ha fitxers mostra el títol --}}
        <h3 class="text-center mt-5 mb-3"><strong>Fitxers pujats</strong></h3>
    @else 
        <h3 class="text-center mt-5 mb-3">No hi ha fitxers pujats</h3>
    @endif

    <div class="container w-50 mt-4">
        @php $i = 0; @endphp {{-- Variable per a controlar els modals --}}
        @foreach ($resources as $resource)
            
            <div class="fitxer row mb-2">
                <div class="column col-1 mt-2">
                    <i class="far fa-file fa-3x fitxer-img"></i>
                </div>
                <div class="column col-8 mt-1">
                    <div>
                        <a class="btn-fitxer" href={{route('resource.download', $resource->f_route)}}><strong>{{ $resource->f_name }}</strong></a>
                    </div>
                    <div>
                        <p class="mida">{{$resource->f_weight}}</p>
                    </div>
                </div>
                <div class="column col mt-3">
                    <a class="btn-fitxer" href={{route('resource.download', $resource->f_route)}}><i class="fas fa-arrow-circle-down fa-2x mr-2"></i></a>
                    @if (Auth::user()->id_role == 2 || Auth::user()->id_role == 4 || Auth::user()->id_role == 5 || Auth::user()->id_role == 1)  
                        <a class="btn-fitxer"data-toggle="modal" data-target="#deleteConfirmationModal{{$i}}"><i class="fas fa-trash fa-2x"></i></a>

                        <div class="modal fade" id="deleteConfirmationModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Estàs segur d'eliminar el fitxer <strong>{{ $resource->f_name }}</strong>?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" name="cancel" class="btn btn-success" data-dismiss="modal">Cancel·la</button>
                                        <a type="button" class="btn btn-danger" name="delete" href="{{route('resource.delete', $resource->f_route)}}">Elimina</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @php $i++ @endphp
        @endforeach
    </div>
</div> 

@endif

<script src="{{asset('js/g1/js.js')}}"></script>

