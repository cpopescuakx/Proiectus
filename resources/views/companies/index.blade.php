@extends('layouts.default')

@section('content')
  <a href="{{ route('companies.createCompanies') }}" class="btn btn-success mb-2">AFEGEIX EMPRESA</a>
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
                 <td><a href="{{ route('companies.editCompanies',$company->id_company)}}" class="btn btn-primary">EDITA</a></td>
                 <td>
                 <form action="{{ route('companies.destroyCompanies', $company->id_company)}}" method="post">
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
