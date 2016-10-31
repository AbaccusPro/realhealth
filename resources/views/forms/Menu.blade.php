<!--Este es el menu que vendría siendo el sidebar de la izquierda -->
<!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
      <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
      <div class="sidebar-overlay-slide from-top" id="appMenu">
        <div class="row">
          <div class="col-xs-6 no-padding">
          {{--
          existen muchos helpers que facilitan las referencias en laravel.. el helper asset hacer referencia ala carpeta publica del proyecto por lo que en la linea de codigo:
          {{asset('styles/assets/img/demo/social_app.svg')}}
          esta diciendo que en la carpeta publica del proyecto se siga la siguente ruta: styles/assets/img/demo/social_app.svg para encontrar la imagen y mostrarla
           --}}
            <a href="#" class="p-l-40"><img src="{{asset('styles/assets/img/demo/social_app.svg')}}" alt="socail">
            </a>
          </div>
          <div class="col-xs-6 no-padding">
            <a href="#" class="p-l-10"><img src="{{asset('styles/assets/img/demo/email_app.svg')}}" alt="socail">
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 m-t-20 no-padding">
            <a href="#" class="p-l-40"><img src="{{asset('styles/assets/img/demo/calendar_app.svg')}}" alt="socail">
            </a>
          </div>
          <div class="col-xs-6 m-t-20 no-padding">
            <a href="#" class="p-l-10"><img src="{{asset('styles/assets/img/demo/add_more.svg')}}" alt="socail">
            </a>
          </div>
        </div>
      </div>
      <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
        <img src="{{asset('styles/assets/img/logo_white.png')}}" alt="logo" class="brand" data-src="{{asset('styles/assets/img/logo_white.png')}}" data-src-retina="{{asset('styles/assets/img/logo_white.png')}}" width="78" height="24">
        <div class="sidebar-header-controls">
          <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
          </button>
          <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
          </button>
        </div>
      </div>
      <!-- END SIDEBAR MENU HEADER-->
      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-30 ">
            <a href="{{ url('#') }}" class="detailed">
              <span class="title">Dashboard</span>
            </a>
            <span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
          </li>
          <li class="">
            <a href="javascript:;"><span class="title">Assign Workout</span>
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i class="fa fa-user-md"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="{{ url('assign/workout') }}">Assign</a>                
              </li>
            </ul>
          </li>
          <li class="">
            <a href="javascript:;"><span class="title">Users</span>
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i class="fa fa-bar-chart-o"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="{{ url('users') }}">Manage</a>
              </li>
              <li class="">
                <a href="{{ url('create/user') }}" class="not-active">Register</a>
              </li>
            </ul>
          </li>
          @if (\Auth::user()->nutrition == 1)
          <li class="">
            <a href="{{ url('nutrition') }}" class="detailed">
              <span class="title">Nutrition</span>
            </a>
            <span class="icon-thumbnail"><i class="pg-home"></i></span>
          </li>
          @endif
          @if (\Auth::user()->therapy == 1)
          <li class="">
            <a href="{{ url('therapy') }}" class="detailed">
              <span class="title">Therapy</span>
            </a>
            <span class="icon-thumbnail"><i class="pg-home"></i></span>
          </li>
          @endif
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
        </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->