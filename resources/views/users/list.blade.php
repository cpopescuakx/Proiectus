@extends('user.layout')

@section('content')
  <a href="{{ route('user.create') }}" class="btn btn-success mb-2">AFEGEIX USUARI</a>
  <br>
   <div class="row">
        <div class="col-12">

          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>ID</th>
                 <th>FIRSTNAME</th>
                 <th>LASTNAME</th>
                 <th>NAME</th>
                 <th>EMAIL</th>
                 <th>DNI</th>
                 <td colspan="2">ACTION</td>
              </tr>
           </thead>
           <tbody>
              @foreach($users as $user)
              <tr>
                 <td>{{ $user->id }}</td>
                 <td>{{ $user->firstname }}</td>
                 <td>{{ $user->lastname }}</td>
                 <td>{{ $user->name }}</td>
                 <td>{{ $user->email }}</td>
                 <td>{{ $user->nif }}</td>
                 <td><a href="{{ route('users.edit',$user-id)}}" class="btn btn-primary">EDITA</a></td>
                 <td>
                 <form action="{{ route('user.destroy', $user->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">ELIMINA</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $users->links() !!}
       </div>
   </div>
 @endsection
