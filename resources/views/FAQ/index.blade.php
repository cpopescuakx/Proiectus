@extends('layouts.default')
@section('content')
<head>
    <!-- Ya no hace falta, está añadido por defecto a la plantilla default
<meta name="csrf-token" content="{{ csrf_token() }}">
    -->
</head>
<body>
<div class="container">
<h1 class="text-center">FAQ</h1>
<br>
    <div class="row">
        <div class="col-lg-4">
            <div class="nav nav-pills faq-nav" id="faq-tabs" role="tablist" aria-orientation="vertical">
                <a href="#tab1" class="nav-link active" data-toggle="pill" role="tab" aria-controls="tab1" aria-selected="true">
                    <i class="mdi mdi-help-circle"></i> Projecte
                </a>
                <a href="#tab2" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab2" aria-selected="false">Proposta</a>
                <a href="#tab3" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab3" aria-selected="false">Blog</a>
                <a href="#tab4" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab4" aria-selected="false">Wiki</a>
                <a href="#tab5" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab5" aria-selected="false">Xat</a>
                <a href="#tab6" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab6" aria-selected="false">Correu</a>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="tab-content" id="faq-tab-content">
                <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
                    <div class="accordion" id="accordion-tab-1">
                    @foreach($ProjecteFAQS as $faq)
                        <div class="card">
                            <div class="card-header" id="accordion-tab-1-heading-{{$faq->id}}">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-{{$faq->id}}" aria-expanded="false" aria-controls="accordion-tab-1-content-{{$faq->id}}">{{$faq->question}}</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-1-content-{{$faq->id}}" aria-labelledby="accordion-tab-1-heading-{{$faq->id}}" data-parent="#accordion-tab-1">
                                <div class="card-body">
                                    <p>{!!$faq->answer!!}</p>
                                    <br>
                                    <input type="hidden" id="id_faq" value="{{$faq->id}}">
                                    <a role="button" class="like" data-id="{{$faq->id}}"> <span class="material-icons text-secondary">thumb_up</span> </a>
                                    <a role="button" class="dislike" data-id="{{$faq->id}}"> <span class="material-icons text-secondary">thumb_down</span> </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="tab-pane" id="tab2" role="tabpanel" aria-labelledby="tab2">
                    <div class="accordion" id="accordion-tab-2">
                    @foreach($PropostaFAQS as $faq)
                        <div class="card">
                            <div class="card-header" id="accordion-tab-2-heading-{{$faq->id}}">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-2-content-{{$faq->id}}" aria-expanded="false" aria-controls="accordion-tab-2-content-{{$faq->id}}">{{$faq->question}}</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-2-content-{{$faq->id}}" aria-labelledby="accordion-tab-2-heading-{{$faq->id}}" data-parent="#accordion-tab-2">
                                <div class="card-body">
                                    <p>{!!$faq->answer!!}</p>
                                    <br>
                                    <input type="hidden" id="id_faq" value="{{$faq->id}}">
                                    <a role="button" class="like" data-id="{{$faq->id}}"> <span class="material-icons text-secondary">thumb_up</span> </a>
                                    <a role="button" class="dislike" data-id="{{$faq->id}}"> <span class="material-icons text-secondary">thumb_down</span> </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="tab-pane" id="tab3" role="tabpanel" aria-labelledby="tab3">
                    <div class="accordion" id="accordion-tab-3">
                    @foreach($BlogFAQS as $faq)
                        <div class="card">
                            <div class="card-header" id="accordion-tab-3-heading-{{$faq->id}}">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-3-content-{{$faq->id}}" aria-expanded="false" aria-controls="accordion-tab-3-content-{{$faq->id}}">{{$faq->question}}</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-3-content-{{$faq->id}}" aria-labelledby="accordion-tab-3-heading-{{$faq->id}}" data-parent="#accordion-tab-3">
                                <div class="card-body">
                                    <p>{!!$faq->answer!!}</p>
                                    <br>
                                    <input type="hidden" id="id_faq" value="{{$faq->id}}">
                                    <a role="button" class="like" data-id="{{$faq->id}}"> <span class="material-icons text-secondary">thumb_up</span> </a>
                                    <a role="button" class="dislike" data-id="{{$faq->id}}"> <span class="material-icons text-secondary">thumb_down</span> </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="tab-pane" id="tab4" role="tabpanel" aria-labelledby="tab4">
                    <div class="accordion" id="accordion-tab-4">
                        @foreach($WikiFAQS as $faq)
                        <div class="card">
                            <div class="card-header" id="accordion-tab-4-heading-{{$faq->id}}">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-4-content-{{$faq->id}}" aria-expanded="false" aria-controls="accordion-tab-4-content-{{$faq->id}}">{{$faq->question}}</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-4-content-{{$faq->id}}" aria-labelledby="accordion-tab-4-heading-{{$faq->id}}" data-parent="#accordion-tab-4">
                                <div class="card-body">
                                    <p>{!!$faq->answer!!}</p>
                                    <br>
                                    <input type="hidden" id="id_faq" value="{{$faq->id}}">
                                    <a role="button" class="like" data-id="{{$faq->id}}"> <span class="material-icons text-secondary">thumb_up</span> </a>
                                    <a role="button" class="dislike" data-id="{{$faq->id}}"> <span class="material-icons text-secondary">thumb_down</span> </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane" id="tab5" role="tabpanel" aria-labelledby="tab5">
                    <div class="accordion" id="accordion-tab-5">
                    @foreach($XatFAQS as $faq)
                        <div class="card">
                            <div class="card-header" id="accordion-tab-5-heading-{{$faq->id}}">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-5-content-{{$faq->id}}" aria-expanded="false" aria-controls="accordion-tab-5-content-{{$faq->id}}">{{$faq->question}}</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-5-content-{{$faq->id}}" aria-labelledby="accordion-tab-5-heading-{{$faq->id}}" data-parent="#accordion-tab-5">
                                <div class="card-body">
                                    <p>{!!$faq->answer!!}</p>
                                    <br>
                                    <a role="button" class="like" data-id="{{$faq->id}}"> <span class="material-icons text-secondary">thumb_up</span> </a>
                                    <a role="button" class="dislike" data-id="{{$faq->id}}"> <span class="material-icons text-secondary">thumb_down</span> </a>
                                </div> 
                            </div>                       
                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="tab-pane" id="tab6" role="tabpanel" aria-labelledby="tab6">
                    <div class="accordion" id="accordion-tab-6">
                    @foreach($CorreuFAQS as $faq)
                        <div class="card">
                            <div class="card-header" id="accordion-tab-6-heading-{{$faq->id}}">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-6-content-{{$faq->id}}" aria-expanded="false" aria-controls="accordion-tab-6-content-{{$faq->id}}">{{$faq->question}}</button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-6-content-{{$faq->id}}" aria-labelledby="accordion-tab-6-heading-{{$faq->id}}" data-parent="#accordion-tab-6">
                                <div class="card-body">
                                    <p>{!!$faq->answer!!}</p>
                                    <br>
                                    <a role="button" class="like" data-id="{{$faq->id}}"> <span class="material-icons text-secondary">thumb_up</span> </a>
                                    <a role="button" class="dislike" data-id="{{$faq->id}}"> <span class="material-icons text-secondary">thumb_down</span> </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<style>
body {
  margin-top: 30px;
  background-color: #eee;
}
.faq-nav {
  flex-direction: column;
  margin: 0 0 32px;
  border-radius: 2px;
  border: 1px solid #ddd;
  box-shadow: 0 1px 5px rgba(85, 85, 85, 0.15);
}
.faq-nav .nav-link {
  position: relative;
  display: block;
  margin: 0;
  padding: 13px 16px;
  background-color: #fff;
  border: 0;
  border-bottom: 1px solid #ddd;
  border-radius: 0;
  color: #616161;
  transition: background-color 0.2s ease;
}
.faq-nav .nav-link:hover {
  background-color: #f6f6f6;
}
.faq-nav .nav-link.active {
  background-color: #f6f6f6;
  font-weight: 700;
  color: rgba(0, 0, 0, 0.87);
}
.faq-nav .nav-link:last-of-type {
  border-bottom-left-radius: 2px;
  border-bottom-right-radius: 2px;
  border-bottom: 0;
}
.faq-nav .nav-link i.mdi {
  margin-right: 5px;
  font-size: 18px;
  position: relative;
}

.tab-content {
  box-shadow: 0 1px 5px rgba(85, 85, 85, 0.15);
}
.tab-content .card {
  border-radius: 0;
}
.tab-content .card-header {
  padding: 15px 16px;
  border-radius: 0;
  background-color: #f6f6f6;
}
.tab-content .card-header h5 {
  margin: 0;
}
.tab-content .card-header h5 button {
  display: block;
  width: 100%;
  padding: 0;
  border: 0;
  font-weight: 700;
  color: rgba(0, 0, 0, 0.87);
  text-align: left;
  white-space: normal;
}
.tab-content .card-header h5 button:hover, .tab-content .card-header h5 button:focus, .tab-content .card-header h5 button:active, .tab-content .card-header h5 button:hover:active {
  text-decoration: none;
}
.tab-content .card-body p {
  color: #616161;
}
.tab-content .card-body p:last-of-type {
  margin: 0;
}

.accordion > .card:not(:first-child) {
  border-top: 0;
}

.collapse.show .card-body {
  border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}
</style>
@endsection