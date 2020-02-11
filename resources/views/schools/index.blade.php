@extends('layouts.default')

@section('content')
<a href="{{ route('schools.create') }}" class="btn btn-success mb-2">AFEGEIX INSTITUT</a>
  <br>
   <div class="row">
        <div class="col-12">

          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>ID</th>
                 <th>EMAIL</th>
                 <th>NOM</th>
                 <th>CODI</th>
                 <th>Tipus</th>
                 <th>ESTAT</th>
                 <td colspan="2">ACTION</td>
              </tr>
           </thead>
           <tbody>
              @foreach($schools as $school)
              <tr>
                 <td>{{ $school->id_school }}</td>
                 <td>{{ $school->email }}</td>
                 <td>{{ $school->name }}</td>
                 <td>{{ $school->code }}</td>
                 <td>{{ $school->type }}</td>
                 <td>{{ $school->status }}</td>
                 <td><a href="{{ route('schools.edit',$school->id_school)}}" class="btn btn-primary">EDITA</a></td>
                 <td>
                 <form action="{{ route('schools.destroy', $school->id_school)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">ELIMINA</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
       </div>
   </div>
@stop
