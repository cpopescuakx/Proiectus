<nav id="sidebar">
  <div class="custom-menu">
    <button type="button" id="sidebarCollapse" class="btn btn-primary">
      <i class="fa fa-bars"></i>
      <span class="sr-only">Toggle Menu</span>
    </button>
  </div>


      <div class="d-inline-flex pt-3 pl-3">
      @if(Auth::check())
      <div id="notifications" class="">
          <a href="#" id="notificationDropdown" class="dropdown-toggle-split" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
              <span class="material-icons"> notifications </span>
              @if(auth()->user()->unReadNotifications->count())
                  <span class="badge badge-pill badge-info">{{auth()->user()->unReadNotifications->count()}}</span>
              @endif
          </a>
          <div id="notificationContent" class="dropdown-menu" aria-labelledby="notificationDropdown">
              @if(auth()->user()->notifications->count() == 0)

                          <div class="dropdown-header">No tens cap notificació</div>

              @else
                  <div class="dropdown-header row">
                      <div class="col-lg-12 col-sm-12 col-12">
                          <span>Notificacions ({{auth()->user()->unReadNotifications->count()}})</span>
                          <a style="font-size: small" href="{{route('markAllRead')}}" class="float-right text-info">Marca totes com a llegides</a>
                      </div>
                  </div>
                  <div class="dropdown-divider"></div>
                  @foreach(auth()->user()->unReadNotifications as $notification)
                      <a class="dropdown-item bg-light">
                          <div class="col-lg-8 col-sm-8 col-8">
                          <div>
                              {!! $notification->data['data'] !!}
                          </div>
                          <small class="text-black-50">{{$notification->updated_at}}</small>
                          </div>
                      </a>
                  @endforeach

                  @foreach(auth()->user()->readNotifications as $notification)
                      <a class="dropdown-item">
                          <div class="col-lg-8 col-sm-8 col-8">
                              <div>
                                  {!! $notification->data['data'] !!}
                              </div>
                              <small class="text-black-50">{{$notification->updated_at}}</small>
                          </div>
                      </a>
                  @endforeach
              @endif
          </div>
      </div>
      @endif
      <div id="cercador" class="">
          <a href="{{route('cercador.index')}}">
              <span class="material-icons"> search </span>
          </a>
      </div>
      </div>
    <div class="p-4 pt-5">
        <h1><a href="{{route('index.index')}}" class="logo">Proiectus</a></h1>
      <ul class="list-unstyled components mb-5">
      <!-- Elemento menu -->
      @guest
      <li class="nav-item ml-3">
          <a type="button" class="btn btn-outline-primary"  href="{{ route('login') }}">Inicia sessió<span class="sr-only">(current)</span></a>
      </li>
      @else
          <li>

          </li>
      <!-- Elemento menu FIN -->
      <li class="mb-3">
        <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <!-- Muestra una imagen por defecto si el usuario no ha subido ninguna foto de perfil -->
          @if(Auth::user()->profile_pic == null)
          <img src="\img\profile_pic\avatar_2x.png" class="foto-perfil" alt="imatge_de_perfil"><span class="mr-3"></span>{{ Auth::user()->username }}</a>
          <!-- Muestra la imagen que ha seleccionado el usuario -->
          @else
          <img class="foto-perfil" src="\img\profile_pic\imatge{{ Auth::user()->profile_pic }}" alt="imatge_de_perfil"/><span class="mr-3"></span>{{ Auth::user()->username }}</a>
          @endif
        <ul class="collapse list-unstyled" id="userSubmenu">
          <li>
              <a href="{{ route('managers.indexP1', ['id' => Auth::user()->id]) }}">Perfil d'usuari</a>
          </li>
          <li>
              <a href="{{route('invitacio')}}">Convidar a un nou usuari</a>
          </li>
          <li>
              <a href="{{ route('tickets.create') }}">Notificar un error</a>
          </li>
          <li>
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
          </li>
          <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
          <li>

          </li>
        </ul>
      </li>
      @endif
      <li>
        <a href="{{ route('index.index') }}"><span class="fa fa-home mr-3"></span>Home</a>
      </li>

      <li>
        @if(Auth::guest())
        @else
        @if (Auth::user()->id_role == 5 || Auth::user()->id_role == 1 || Auth::user()->id_role == 4)
        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-users mr-3"></span>Usuaris</a>
        <ul class="collapse list-unstyled" id="homeSubmenu">
          <li>
            @if(Auth::guest())
            @else
            @if (Auth::user()->id_role == 5 || Auth::user()->id_role == 1 || Auth::user()->id_role == 4)
              <a href="{{ route('students.index') }}"><span class="fa fa-user mr-3"></span>Estudiants</a>
              @endif
              @endif
          </li>
          <li>
            @if(Auth::guest())
            @else
            @if (Auth::user()->id_role == 5 || Auth::user()->id_role == 1)
              <a href="{{ route('professors.index') }}"><span class="fa fa-user mr-3"></span>Professors</a>
              @endif
              @endif
          </li>
          <li>
            @if(Auth::guest())
            @else
            @if (Auth::user()->id_role == 5 || Auth::user()->id_role == 1)
              <a href="{{ route('employee.index') }}"><span class="fa fa-user mr-3"></span>Empleats</a>
              @endif
              @endif
          </li>
          <li>
            @if(Auth::guest())
            @else
            @if (Auth::user()->id_role == 5 || Auth::user()->id_role == 1)
              <a href="{{ route('managers.index') }}"><span class="fa fa-user mr-3"></span>Gestors</a>
              @endif
              @endif
          </li>
        </ul>
        @endif
        @endif
      </li>

      <li>
          <a href="#proposalsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-sticky-note mr-3"></span>Propostes</a>
          <ul class="collapse list-unstyled" id="proposalsSubmenu">
            <li>
                <a href="{{ route('proposals.index') }}"><span class="fa fa-sticky-note mr-3"></span>Gestió de les Propostes</a>
            </li>
            <li>
              <a href="{{ route('proposals.all') }}"><span class="fa fa-sticky-note mr-3"></span>Totes les Propostes</a>
            </li>
            <li>
              <a href="{{ route('proposals.dashboard', ['id' => Auth::user()->id]) }}"><span class="fa fa-sticky-note mr-3"></span>Les meves Propostes</a>
            </li>
          </ul>
      </li>

      <li>
        <a href="#projectsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-briefcase mr-3"></span>Projectes</a>
        <ul class="collapse list-unstyled" id="projectsSubmenu">
          <li>
              <a href="{{ route('projects.index') }}"><span class="fa fa-briefcase mr-3"></span>Gestió dels Projectes</a>
          </li>
          <li>
              <a href="{{ route('projects.dashboard') }}"><span class="fa fa-briefcase mr-3"></span>Tots els projectes</a>
          </li>
        </ul>
      </li>

      <li>
        @if(Auth::guest())
        @else
        @if (Auth::user()->id_role == 1)
        <a href="#entitiesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="fa fa-building mr-3"></span>Entitats</a>
        <ul class="collapse list-unstyled" id="entitiesSubmenu">
          <li>
              <a href="{{ route('schools.index') }}"><span class="fas fa-school mr-3"></span>Centres</a>
          </li>
          <li>
              <a href="{{ route('companies.index') }}"><span class="fa fa-black-tie mr-3"></span>Empreses</a>
          </li>
        </ul>
        @endif
        @endif
      </li>

    </ul>

    <div class="mb-5">
      <h3 class="h6 ml-2">Subscriu-te per rebre notificacions</h3>
        <div class="form-group d-flex">
          <div class="icon"><span class="icon-paper-plane"></span></div>
          <!-- Begin Mailchimp Signup Form -->
          <link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
          <style type="text/css">
          	#mc_embed_signup{clear:left; font:14px Helvetica,Arial,sans-serif;  width:222px;}
          </style>
          <div id="mc_embed_signup">
          <form action="https://proiectus.us8.list-manage.com/subscribe/post?u=2ce2bd7646119be3b18cdd74f&amp;id=283927efff" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
              <div id="mc_embed_signup_scroll">
          	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Adreça e-mail" required>
              <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
              <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_2ce2bd7646119be3b18cdd74f_283927efff" tabindex="-1" value=""></div>
              <div class="clear"><input type="submit" value="Enviar" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
              </div>
          </form>
          </div>
          <!--End mc_embed_signup-->
        </div>
    </div>
  </div>
</nav>
