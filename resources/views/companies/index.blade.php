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
             <!-- <td>
                <a href="{{ route('companies.edit',$company->id_company)}}"><img src={{ asset('img/edit.svg') }} width="20" height="20" class="mr-2"></a>

                <form action="{{ route('companies.destroy', $company->id_company)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit"><img  src={{ asset('img/delete.svg') }} width="20" height="20"></a></button>
                </form>
            </td> -->
            <td>
                <a href ="{{ route('companiesUser.index',$company->id_company) }}"><i class="large material-icons mr-2 large align-bottom" style="color: #116466; font-size: 29px;">person_add</i>
                <a href="{{ route('companies.edit',$company->id_company) }}"><img src={{ asset('img/edit.svg') }} width="20" height="20" class="mr-2" alt="icona per a editar"></a>

                @if($company->status == "active")
                    <a data-toggle="modal" data-target="#deleteConfirmationModal"><img src={{ asset('img/delete.svg') }} width="20" height="20" alt="icona per a eliminar"></a>
                @endif
            </td>
           </tr>
               <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalLabel">Estàs segur d'eliminar l'empresa?</h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                               </button>
                           </div>
                           <div class="modal-footer">
                               <button type="button" name="cancel" class="btn btn-success" data-dismiss="modal">Cancela</button>
                               <a type="button" class="btn btn-danger" name="delete" href="{{ route('companies.destroy', $company->id_company) }}">Elimina</a>
                           </div>
                       </div>
                   </div>
               </div>
        @endforeach
    </tbody>
</table>
@endsection
