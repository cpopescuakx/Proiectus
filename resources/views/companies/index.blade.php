@extends('layouts.default')

@section('content')

<div class="col">
  <br></br>
  <h3 class="align-middle">GESTIÓ D'EMPRESES</h3>
    <div class="row d-flex justify-content-end p-4">
      <a href="{{ route('companies.create') }}"><img src={{ asset('img/add.svg') }} width="45" height="45" ></a>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <td><strong>ID</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Nom</strong></td>
            <td><strong>Nif</strong></td>
            <!-- <td><strong>Adreça</strong></td>
            <td><strong>Telèfon</strong></td> -->
            <td><strong>Sector</strong></td>
            <!-- <td><strong>Ciutat</strong></td> -->
            <td><strong>Estat</strong></td>
            <td colspan="2"><strong>Accions</strong></td>
        </tr>
    </thead>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <tbody>
        @foreach($companies as $company)
          <tr>
             <td>{{ $company->id_company }}</td>
             <td>{{ $company->email }}</td>
             <td>{{ $company->name }}</td>
             <td>{{ $company->nif }}</td>
             <!--<td>{{ $company->address }}</td>-->
             <!--<td>{{ $company->phone_number }}</td>-->
             <td>{{ $company->sector }}</td>
             <!--<td>{{ $company->id_city }}</td>-->
             <td>{{ $company->status }}</td>
             <!--<td>{{ date('Y-m-d', strtotime($company->created_at)) }}</td>-->
             <td>
                <a href="{{ route('companies.edit',$company->id_company)}}"><img src={{ asset('img/edit.svg') }} width="20" height="20" class="mr-2"></a>
             </td>
             <td>
                <form action="{{ route('companies.destroy', $company->id_company)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit"><img  src={{ asset('img/delete.svg') }} width="20" height="20"></a></button>
                </form>
            </td>
           </tr>
        @endforeach
    </tbody>
</table>
@endsection
