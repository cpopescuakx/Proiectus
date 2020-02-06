@extends('user.layout')

@section('content')
  <a href="{{ route('user.create') }}" class="btn btn-success mb-2">AFEGEIX EMPRESA</a>
  <br>
   <div class="row">
        <div class="col-12">

          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>ID</th>
                 <th>EMAIL</th>
                 <th>NOM</th>
                 <th>NIF</th>
                 <!--<th>ADREÇA</th>-->
                 <!--<th>TELÉFON</th>-->
                 <th>SECTOR</th>
                 <!--<th>ID CIUTAT</th>-->
                 <th>ESTAT</th>
                 <td colspan="2">ACTION</td>
              </tr>
           </thead>
           <tbody>
              @foreach($companies as $user)
              <tr>
                 <td>{{ $user->id_user }}</td>
                 <td>{{ $user->email }}</td>
                 <td>{{ $user->name }}</td>
                 <td>{{ $user->nif }}</td>
                 <!--<td>{{ $user->address }}</td>-->
                 <!--<td>{{ $user->phone_number }}</td>-->
                 <td>{{ $user->sector }}</td>
                 <!--<td>{{ $user->id_city }}</td>-->
                 <td>{{ $user->status }}</td>
                 <!--<td>{{ date('Y-m-d', strtotime($user->created_at)) }}</td>-->
                 <td><a href="{{ route('companies.edit',$user->id_user)}}" class="btn btn-primary">EDITA</a></td>
                 <td>
                 <form action="{{ route('companies.destroy', $user->id_user)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">ELIMINA</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $companies->links() !!}
       </div>
   </div>
 @endsection
