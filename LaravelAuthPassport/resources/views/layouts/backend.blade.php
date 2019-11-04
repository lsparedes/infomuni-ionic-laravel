<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Infomuni @yield('Title') </title>

        <meta name="description" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

        <!-- Fonts and Styles -->
        
            <!-- Page JS Plugins CSS -->
 
        
        @yield('css_before')
            <link rel="stylesheet" id="css-main" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
            <link rel="stylesheet" id="css-theme" href="{{ asset('css/dashmix.css') }}">
        @yield('css_after')

        <!-- Scripts -->
<!--        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>-->

    </head>
    <body>
        
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow">
     

            <!-- Sidebar -->
            <nav id="sidebar" aria-label="Main Navigation" >
                <!-- Side Header -->
                <div class="bg-header-dark" style="background-color:#F21905 !important">
                    <div class="content-header bg-white-10">
                        <!-- Logo -->
                        <a class="font-w600 font-size-lg text-white" href="/">
                            <span class="smini-visible">
                                <span class="text-white-75">D</span><span class="text-white">x</span>
                            </span>
                            <span class="smini-hidden">
                              <center>
                               <img src="{{asset('img/infomuni2.png')}}" width="35%">
                               </center>
                            </span>
                        </a>
                        <!-- END Logo -->

                        <!-- Options -->
                        <div>
                            <!-- Toggle Sidebar Style -->
                            <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" data-toggle="layout" data-action="sidebar_style_toggle" href="javascript:void(0)">
                                <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                            </a>
                            <!-- END Toggle Sidebar Style -->

                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                                <i class="fa fa-times-circle"></i>
                            </a>
                            <!-- END Close Sidebar -->
                        </div>
                        <!-- END Options -->
                    </div>
                </div>
                <!-- END Side Header -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">

                        <li class="nav-main-item">
                           <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                               <i class="nav-main-link-icon fas fa-user-tie" style="color:#f03005"></i>
<!--                                <i class=" si si-grid"></i>-->
                                <span class="nav-main-link-name">Emprende</span>
                            </a>
                               <ul class="nav-main-submenu">
                                 <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('emprende.index') }}">
                                        <span class="nav-main-link-name">Ver todos</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('emprende.create') }}">
                                        <span class="nav-main-link-name">Nuevo emprendedor</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>

                        @yield('SideNavigation')

                        <!-- <li class="nav-main-heading">Various</li> -->


                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                                    <i class="nav-main-link-icon far fa-calendar-alt" style="color:#f03005"></i>   
<!--                                <i class="nav-main-link-icon fa fa-code-branch"></i>-->
                                <span class="nav-main-link-name">Eventos</span>
                            </a>
                                                   <ul class="nav-main-submenu">
                                 <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ asset('/Evento/event') }}">
                                        <span class="nav-main-link-name">Ver todos</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ asset('/Evento/form') }}">
                                        <span class="nav-main-link-name">Nuevo evento</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>

                        <li class="nav-main-item">
                           <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                               <i class="nav-main-link-icon fas fa-chart-bar" style="color:#f03005"></i>
<!--                                <i class="nav-main-link-icon fa fa-briefcase"></i>-->
                                <span class="nav-main-link-name">Participación</span>
                            </a>
                                     <ul class="nav-main-submenu">
                                 <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{route('participacion.index')}}">
                                        <span class="nav-main-link-name">Ver todos</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{route('participacion.create')}}">
                                        <span class="nav-main-link-name">Nueva encuesta</span>
                                    </a>
                                </li>
                            
                           
                                
                            </ul>
                        </li>

                      <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                                <i class="nav-main-link-icon fas fa-map-marker-alt" style="color:#f03005"></i>
<!--                                <i class="nav-main-link-icon fa fa-cloud-download-alt"></i>-->
                                <span class="nav-main-link-name">Infomapa</span>
                            </a>
                               <ul class="nav-main-submenu">
                                 <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{route('infomapa.index')}}">
                                        <span class="nav-main-link-name">Ver todos</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{route('infomapa.create')}}">
                                        <span class="nav-main-link-name">Nuevo lugar</span>
                                    </a>
                                </li>
                                 </ul>
                        </li>
                        
                     <li class="nav-main-item">
                           <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                               <i class="nav-main-link-icon far fa-fw fa-user" style="color:#f03005"></i>
<!--                                <i class="nav-main-link-icon fa fa-briefcase"></i>-->
                                <span class="nav-main-link-name">Usuarios</span>
                            </a>
                                     <ul class="nav-main-submenu">
                                 <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{route('users.index')}}">
                                        <span class="nav-main-link-name">Ver todos</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{route('users.create')}}">
                                        <span class="nav-main-link-name">Nuevo usuario</span>
                                    </a>
                                </li>
                                        </ul>
                                         </li>
                              
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header" style="background-color:#F21905 !important">
                <!-- Header Content -->
                <div class="content-header">
                    
                    <!-- Left Section -->
                    <div>
                        <!-- Toggle Sidebar -->
                        <button type="button" class="btn btn-dual mr-1" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <!-- END Toggle Sidebar -->

                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div>
                        
                      
                        <!-- END Notifications Dropdown -->

                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-fw fa-user d-sm-none"></i>
                                <span class="d-none d-sm-inline-block">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</span>
                                <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                                <!--<div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                   Opciones de Usuario
                                </div>-->
                                <div class="p-2">
                                   <!-- <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="far fa-fw fa-user mr-1"></i> Perfil
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                        <span><i class="far fa-fw fa-envelope mr-1"></i> Inbox</span>
                                        <span class="badge badge-primary">3</span>
                                    </a>-->
                                    <!-- <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="far fa-fw fa-file-alt mr-1"></i> Invoices
                                    </a> -->
<!--                                    <div role="separator" class="dropdown-divider"></div>-->

                                    <!-- Toggle Side Overlay -->
                                  <!--  <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                        <i class="fa fa-cog mr-1"></i> Configuración
                                    </a>-->
                                    <!-- END Side Overlay -->
                                <a class="dropdown-item" href="{{route('profile', Auth::user()->id )}}">
                                        <i class="far fa-fw fa-user mr-1"></i> Editar perfil
                                    </a>
                                  <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i>
                                         Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- END User Dropdown -->


                        <!-- Toggle Side Overlay -->
                       <!-- <button type="button" class="btn btn-dual" data-toggle="layout" data-action="side_overlay_toggle">
                            <i class="fa fa-cog"></i>
                        </button>-->
                        <!-- END Toggle Side Overlay -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->


                <!-- Header Loader -->
                <div id="page-header-loader" class="overlay-header bg-primary-darker">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
            </header>

            <main id="main-container">
                @yield('breadcrumb')
                @yield('content')
            </main>

            <!-- Footer -->
            <!-- <footer id="page-footer" class="bg-body-light">
                <div class="content py-0">
                    <div class="row font-size-sm">
                        <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                            <a class="font-w600" href="https://goo.gl/mDBqx1" target="_blank">DRUP & IPTI </a> &copy; <span data-toggle="year-copy">2019</span>
                        </div>
                    </div>
                </div>
            </footer> -->

        </div>

        <!-- Dashmix Core JS -->
    
<!-- Dashmix Core JS -->
      <!-- Dashmix Core JS -->
        <script src="{{ asset('js/dashmix.core.min.js') }}"></script>

        <!-- Laravel Scaffolding JS -->
        <script src="{{ asset('js/dashmix.app.min.js') }}"></script>
        <!-- Page JS Plugins -->
       
         <script src="{{ asset('js/mascampos.js') }}"></script>
       
         

        @yield('js_after')

    </body>
</html>
