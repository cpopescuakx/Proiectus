
<link rel="stylesheet" type="text/css" href="{{asset('css/components/g1/g1_styles.css')}}">


<h4 class="text-center pb-4 pt-4">Selecciona o arrastra els fitxers</h4>
<div class="w-100">
    <form action="{{route('resource.upload')}}" enctype="multipart/form-data" method="post">
        @csrf
        
        <div class="form-group resource-center w-100"> 
            <input required type="file" class="form-control" name="resources[]" multiple>
        </div>
        <div class="text-center">
            <button style="color: white;" type="submit" class="btn bg-primary1 w-100">Pujar</button>
        </div>
    </form> 
</div>    

