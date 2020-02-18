@extends('layouts.default')

@section('content')
<div class=" formulari ">
    <form class="was-validated" action="{{ route('tickets.update', [$ticket->id_ticket])}}" method="POST">
        {{ csrf_field() }}
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
                                <h1>MODIFICAR PROPOSTA</h1>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <strong>TIPUS</strong>
                                <input type="text" name="type" class="form-control" value="{{ $ticket->type }}" required>
                                <span class="text-danger">{{ $errors->first('type') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <strong>TEMA</strong>
                                <input type="text" name="topic" class="form-control" value="{{ $ticket->topic }}" required>
                                <span class="text-danger">{{ $errors->first('topic') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <strong>PRIORITAT</strong>
                                <select class="form-control" id="exampleFormControlInput1" name="priority" required>
                                    <option value="low">Baixa</option>
                                    <option value="medium" <?php if($ticket->priority == "medium"){echo "selected"; }?>>Mitjana</option>
                                    <option value="high" <?php if($ticket->priority == "high"){echo "selected"; }?>>Alta</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('priority') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <strong>USUARI ASSIGNAT</strong>
                                <select class="form-control" id="exampleFormControlInput1" name="assigned" required>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}" <?php if($ticket->id_assigned_user == $user->id){echo "selected"; }?>>{{$user->firstname}} {{$user->lastname}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('id_assigned_user') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <strong>ESTAT</strong>
                                <select class="form-control" id="exampleFormControlInput1" name="status" required>
                                    <option value="pending">Pendent</option>
                                    <option value="in progress" <?php if($ticket->status == "in progress"){echo "selected"; }?>>En procés</option>
                                    <option value="resolved" <?php if($ticket->status == "resolved"){echo "selected"; }?>>Resolt</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
                                <button type="submit" name="sbumit" class="btn btn-primary">ENVIA</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</div>
</form>
</div>
@stop