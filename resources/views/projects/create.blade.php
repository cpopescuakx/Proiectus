@extends('layouts.default')

@section('content');
<body>
    <h1>Crear un nou projecte</h1>

<form action='{{ route('projects.store') }}' method='POST'> 
  
    @csrf
        <tr><td>Nom del Projecte:</td><br>
          <td><input type="text" name="name"></td>
        </tr>
        <br>
        <div class="row">
            <div></div>
        </div>
        <tr><td>Pressupost:</td><br>
          <td><input type="text" name="budget"></td>
        </tr>
        <br>
        <tr><td>Descripció :</td><br>
          <td><input type="text" name="desc"></td>
        </tr>
        <br>
        <tr><td>Familia Professional:</td><br>
          <td><input type="text" name="pro_family"></td>
        </tr>
        <br>
        <input name='crear' value='Crear' type='submit'/>
    </form>
</body>
@stop


