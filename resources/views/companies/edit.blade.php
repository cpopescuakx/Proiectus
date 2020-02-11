@extends('companies.default')

@section('content')

    <div class=" formulari ">
        <form class="was-validated" action="{{ route('companies.update', $company_info->id_company) }}" method="POST">
            @csrf
            @method('POST')
            <div class="row justify-content-center">
                <div class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-10">
                    <div class="container">
                        <div class="contact-image text-center mt-3">
                            <img class="form-img" src="{{ asset('img/icono_negro.png') }}" />
                        </div>
                    </div>
                    <div class="container contact-form">
                        <div class="container">
                            <div class="row no-gutters justify-content-center mt-5">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <h1>EDITA EMPRESA</h1>
                                </div>
                            </div>
                        </div>


                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <strong>NOM</strong>
                  									<input type="text" name="name" class="form-control" placeholder="Empresa1" value="{{ $company_info->name }}">
                  									<span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <strong>EMAIL</strong>
                  									<input type="text" name="email" class="form-control" placeholder="info@exemple.com" value="{{ $company_info->email }}">
                  									<span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <strong>NIF</strong>
                  									<input type="text" name="nif" class="form-control" placeholder="12345678N" value="{{ $company_info->nif }}">
                  									<span class="text-danger">{{ $errors->first('nif') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <strong>SECTOR</strong>
                  									<input type="text" name="sector" class="form-control" placeholder="Informàtica" value="{{ $company_info->sector }}">
                  									<span class="text-danger">{{ $errors->first('sector') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <strong>ESTAT</strong>
                  									<select class="form-control" value="{{$company_info->status}}" name="status">
                  									  <option value="active">active</option>
                  									  <option value="inactive">inactive</option>
                  									</select>
                  									<span class="text-danger">{{ $errors->first('status') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                    <button type="submit" name = "sbumit" class="btn btn-primary">ENVIA</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>

@endsection
