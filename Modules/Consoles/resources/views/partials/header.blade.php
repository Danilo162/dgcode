@php
    use Illuminate\Support\Facades\Route;$getConfig = getDefautTheme();

@endphp
    <!DOCTYPE html>
<html class="{{$getConfig}}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'GDD - Groupement pour le Développement Durable')</title>
    <meta name="description" content="@yield('description', 'GDD œuvre pour un développement durable en Afrique à travers des actions concrètes et des partenariats stratégiques.')">
    <meta name="keywords" content="développement durable, Afrique, ONG, projets, formation, environnement">
    <meta name="author" content="GDD - Groupement pour le Développement Durable">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link rel="icon" href="{{help_img_config(2)}}" type="image/jpg"/>
    <!--plugins-->
    <link rel="stylesheet" href="{{asset('manages/assets/plugins/notifications/css/lobibox.min.css')}}"/>
    <link href="{{asset('manages/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet"/>
    <link href="{{asset('manages/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet"/>
    <link href="{{asset('manages/assets/plugins/highcharts/css/highcharts.css')}}" rel="stylesheet"/>
    <link href="{{asset('manages/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
    <link href="{{asset('manages/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet"/>
    <!-- loader-->
    <link href="{{asset('manages/assets/css/pace.min.css')}}" rel="stylesheet"/>
    <script src="{{asset('manages/assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('manages/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('manages/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('manages/assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('manages/assets/css/icons.css')}}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset('manages/assets/css/dark-theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('manages/assets/css/semi-dark.css')}}"/>
    <link rel="stylesheet" href="{{asset('manages/assets/css/header-colors.css')}}"/>
    <link rel="stylesheet" href="{{asset('manages/assets/plugins/sweetalert2/dist/sweetalert2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('manages/assets/css/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('manages/assets/css/monthSelect.css')}}">

    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <script src="{{asset('manages/assets/js/jquery.min.js')}}"></script>
    {{--  <title>Synadmin – Bootstrap5 Admin Template</title>--}}
    <style>
        .breadcrumb-title {
            font-size: 16px;
        }

        /*   body{
           "Public Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
           }*/
        .table > :not(caption) > * > * {
            /*     padding: .1rem .5rem;*/
        }

        #dataTable_length, .dataTables_length {
            width: 20% !important;
            float: left !important;
        }

        #datatables_filter, .dataTables_filter {
            float: left;
            margin-left: 5%;
            width: 35%;
        }

        #datatables_wrapper .dt-buttons.btn-group {
            margin-left: 5%;
        }

        div.dataTables_wrapper div.dataTables_filter label {
            width: 100%;
        }

        div.dataTables_wrapper div.dataTables_filter label input {
            padding: .5rem 1rem;
            width: 80%;
        }

        #datatables_wrapper .buttons-excel.buttons-html5 {
            background: white;
            border-color: #ff9800;
            /*      border-color: #696cff;*/
            color: #00000085;
            font-size: 14px;
        }

        #datatables_wrapper .buttons-pdf.buttons-html5 {
            background: white;
            /*     border-color: #696cff;*/
            border-color: #ff9800;
            color: #00000085;
            font-size: 14px;
        }

        #datatables_wrapper .buttons-colvis {
            background: white;
            border-color: #ff9800;
            /*  border-color: #696cff;*/
            color: #00000085;
            font-size: 14px;
        }

        .invalid-feedback {
            display: block;
        }

        .error_border {
            border-color: red;
        }
        .t_center{
            text-align: center;
        }
        .required:after {
            content:" *";
            color: red;
        }
        .active > .page-link{
            background-color: #ff9800;
            border-color: #ff9800;
            color: white;
        }
        @font-face {

            font-family: 'Bantayog';
            src: url('{{ asset('manages/assets/myfonts/Bantayog-Regular.otf') }}') format('truetype'); /* Chemin vers la police téléchargée */
            font-weight: normal;
            font-style: normal;
        }
        @font-face {

            font-family: 'Fluence';
            src: url('{{ asset('manages/assets/myfonts/Fluence_DEMO.ttf') }}') format('truetype'); /* Chemin vers la police téléchargée */
            font-weight: normal;
            font-style: normal;
        }
        fieldset {
            background-color: #d9dada; /* Arrière-plan léger */
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .form-custom  fieldset legend{
            font-family: 'Bantayog', sans-serif !Important;
            font-size: 20px;
            text-transform: uppercase;

        }
        .form-custom  fieldset label{
            font-family: 'Open Sans', sans-serif !Important;
           /* font-size: 13px;*/
            color: black;

        }
        .form-custom  fieldset label{
            font-family: 'Open Sans', sans-serif !Important;
           /* font-size: 13px;*/
            color: black;
            font-weight: 600;

        }
        .form-custom  input
        , .form-custom select
        , .form-custom textarea{
            font-family: 'Open Sans', sans-serif !Important;
          /*   font-size: 13px;*/
            color: black;
            border-radius: 0 !important;
            font-weight: 500;
        }
        .breadcrumb-custom{
            color: #041052 !important;
            font-weight: bold;
        }
        .card-header-custom{
            font-family: 'Bantayog', sans-serif !Important;
            font-size: 20px;
            text-transform: uppercase;
            color: #fff;
            background-color: #db000b;
            padding: 5px 15px;
        }

        .offcanvas-size-xxl {
            width: 90% !important; /* Par défaut : 80% pour les écrans de bureau et tablette */
        }
        @media (max-width: 991.98px) {
            /* Pour les écrans de tablette (entre 768px et 991.98px) */
            .offcanvas-size-xxl {
                width: 95% !important;
            }
        }
        @media (max-width: 767.98px) {
            /* Pour les écrans mobiles, moins de 768px */
            .offcanvas-size-xxl {
                width: 100% !important;
            }
        }
        .fc-col-header-cell-cushion {
            text-transform: uppercase;
        }
        .fc-toolbar-title {
            text-transform: uppercase;
        }

        /* Style du texte des jours de la semaine */
        .fc-day-header {
            background-color: #000; /* Arrière-plan noir pour les en-têtes de jour */
            color: #fff; /* Couleur du texte en blanc */
        }
        .page-link{
            color:#670098;
        }

        /* Fond noir avec texte et icônes blancs */
        .flatpickr-calendar {
            background-color: #000;
            color: #fff;
        }

        .flatpickr-current-month .numInputWrapper {
            color: #fff; /* Couleur blanche pour tout le texte */
        }

        .flatpickr-current-month .numInputWrapper input.numInput.cur-year {
            background-color: #333; /* Fond gris foncé pour correspondre au thème */
            color: #fff;            /* Texte blanc */
            border: 1px solid #555; /* Bordure grise pour visibilité */
        }

        .flatpickr-current-month .arrowUp,
        .flatpickr-current-month .arrowDown {
            color: #fff; /* Couleur blanche pour les flèches */
        }

        /* Couleur de survol des flèches */
        .flatpickr-current-month .arrowUp:hover,
        .flatpickr-current-month .arrowDown:hover {
            color: #fff !important;
        }
        .flatpickr-monthSelect-month{
            color: #fff;
        }

        .flatpickr-months .flatpickr-next-month {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            text-decoration: none;
            cursor: pointer;
            position: absolute;
            top: 0;
            height: 34px;
            padding: 10px;
            z-index: 3;
            color: rgba(250, 246, 246, 0.9);
            fill: rgb(255, 255, 255);
        }
        .flatpickr-monthSelect-month.flatpickr-disabled{
            color: #888;
        }
        .readonly{
            background: #ede8e8 !important;
        }
        .bg-orange-l{
       background: #ff98006b
        }
        .td-custom{
            background:#a39ea4 !important;
            font-weight: bold;
        }
        html.color-sidebar.sidebarcolor1 .sidebar-wrapper{
            background-image: none;
        }

        .bg-gradient-to-br {
            background-image: linear-gradient(to bottom right, #e0ebf9, #e8ecf6) !important;
        }
        .bg-gradient-to-tr {
            background-image: linear-gradient(to bottom left, #e0ebf9, #e8ecf6);
        }
    </style>
    @stack('styles')
</head>

<body>
<!--wrapper-->
<div class="wrapper
  {{--  {{getDefautThemeMenu()}} --}}


    ">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <img style="width: 100%" src="{{help_img_config(1)}}"
                     class="logo-icon" alt="logo icon">
            </div>
            <div>
               {{-- <h4 class="logo-text">Koumalo</h4>--}}
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
            </div>
        </div>
        <!--navigation-->
        <ul class="metismenu" id="menu">
            <li class="@if(request()->segment(1) == '' or request()->segment(1) ==null)  mm-active  @endif">
                <a href="{{url('/consoles')}}">
                    <div class="parent-icon"><i class='bx bx-home'></i>
                    </div>
                    <div class="menu-title">Tableau de bord</div>
                </a>

            </li>
            <?php

            $menus = listingModule();
            $second_activ = null;

            foreach ($menus as $menu) {

                $params = $menu["route_param"] != "" ? array_merge(params(), $menu["route_param"]) : params();

                if ( (request()->segment(1) == strtolower($menu["name"]))) {
                    $second_activ = " mm-active  ";
                } elseif ( (request()->segment(1) == strtolower($menu["name"]))) {
                    $second_activ = " mm-active  ";
                } else {

                    $second_activ = request()->segment(1) == strtolower($menu["name"]) ? " mm-active  " : "";
                }
                $routeDef = $menu["route"] && Route::has($menu["route"]) ? route($menu['route'], $params) : "";
                $permission = $menu["permission"] ? $menu["permission"] : "";
                $menu_module = $menu["menu_module"] ? $menu["menu_module"] : "";

                ?>
            @if($permission)
                @can($permission)
                    @include('consoles::partials.menu')
                @endcan
            @else
                @include('consoles::partials.menu')
            @endif
                <?php } ?>


         {{--   @can('PARAMETRAGE')--}}
            <li class="menu-label">Paramètres</li>
            <li class="@if(request()->segment(2) == 'settings' )  mm-active  @endif">
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-cog"></i>
                    </div>
                    <div class="menu-title">Paramètrage</div>
                </a>
                <ul>
                    <li><a href="{{route('consoles.settings.categoriementors.index')}}">Catégories Mentors</a></li>
  {{--                  <li><a href="{{route('sitemanages.infogle')}}">Paramètres géneraux</a></li>--}}
                    <li><a href="{{route('consoles.settings.competences.index')}}">Compétences</a></li>
                    <li><a href="{{route('consoles.settings.offres.index')}}">Offres</a></li>
                    <li><a href="{{route('consoles.settings.times.index')}}">Durées Appels</a></li>
                    <li><a href="{{route('consoles.roles')}}">Rôles</a></li>
                    <li><a href="{{route('consoles.settings.permissions.index')}}">Permissions</a></li>
                </ul>
            </li>
        {{--    @endcan--}}
        {{--    <li>
                <a href="" target="_blank">
                    <div class="parent-icon"><i class='bx bx-headphone'></i>
                    </div>
                    <div class="menu-title">Support</div>
                </a>
            </li>--}}
        </ul>
        <!--end navigation-->
    </div>
    <!--end sidebar wrapper -->
    <!--start header -->
    <header>
        <div class="topbar d-flex align-items-center">
            <nav class="navbar navbar-expand gap-3">
                <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                </div>
                <div class="top-menu-left d-none d-lg-block">
                    <ul class="nav">
                      {{--  <li class="nav-item">
                            <a class="nav-link" href="{{route('logs.index')}}"><i class='bx bx-user-circle'></i></a>
                        </li>--}}
                       {{-- <li class="nav-item">
                            <a class="nav-link" href="app-chat-box.html"><i class='bx bx-message'></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="app-fullcalender.html"><i class='bx bx-calendar'></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="app-to-do.html"><i class='bx bx-check-square'></i></a>
                        </li>--}}
                    </ul>
                </div>
                <div class="search-bar flex-grow-1">
                    <div class="position-relative search-bar-box">
                        <form>
                            <input type="text" class="form-control search-control" autofocus
                                   placeholder="Type to search..."> <span
                                class="position-absolute top-50 search-show translate-middle-y"><i
                                    class='bx bx-search'></i></span>
                            <span class="position-absolute top-50 search-close translate-middle-y"><i
                                    class='bx bx-x'></i></span>
                        </form>
                    </div>
                </div>
                <div class="top-menu ms-auto">
                    <ul class="navbar-nav align-items-center gap-1">
                        <li class="nav-item mobile-search-icon">
                            <a class="nav-link" href="javascript:;"><i class='bx bx-search'></i>
                            </a>
                        </li>
                        <li class="nav-item dark-mode d-none d-sm-flex">
                            <a style="display: none" class="nav-link dark-mode-icon" href="javascript:;"><i
                                    class='bx bx-moon'></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false"> <i class='bx bx-category'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="row row-cols-3 g-3 p-3">
                                    <div class="col text-center">
                                        <div class="app-box mx-auto bg-gradient-cosmic"><i class='bx bx-group'></i>
                                        </div>
                                        <div class="app-title">Teams</div>
                                    </div>
                                    <div class="col text-center">
                                        <div class="app-box mx-auto bg-gradient-burning"><i class='bx bx-atom'></i>
                                        </div>
                                        <div class="app-title">Projects</div>
                                    </div>
                                    <div class="col text-center">
                                        <div class="app-box mx-auto bg-gradient-lush"><i class='bx bx-shield'></i>
                                        </div>
                                        <div class="app-title">Tasks</div>
                                    </div>
                                    <div class="col text-center">
                                        <div class="app-box mx-auto bg-gradient-kyoto"><i
                                                class='bx bx-notification'></i>
                                        </div>
                                        <div class="app-title">Feeds</div>
                                    </div>
                                    <div class="col text-center">
                                        <div class="app-box mx-auto bg-gradient-blues"><i class='bx bx-file'></i>
                                        </div>
                                        <div class="app-title">Files</div>
                                    </div>
                                    <div class="col text-center">
                                        <div class="app-box mx-auto bg-gradient-moonlit"><i
                                                class='bx bx-filter-alt'></i>
                                        </div>
                                        <div class="app-title">Alerts</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
                                <i class='bx bx-bell'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:;">
                                    <div class="msg-header">
                                        <p class="msg-header-title">Notifications</p>
                                        <p class="msg-header-clear ms-auto">Marks all as read</p>
                                    </div>
                                </a>
                                <div class="header-notifications-list">
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-primary text-primary"><i
                                                    class="bx bx-group"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
												ago</span></h6>
                                                <p class="msg-info">5 new user registered</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-danger text-danger"><i
                                                    class="bx bx-cart-alt"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
												ago</span></h6>
                                                <p class="msg-info">You have recived new orders</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
												ago</span></h6>
                                                <p class="msg-info">The pdf files generated</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
												ago</span></h6>
                                                <p class="msg-info">5.1 min avarage time response</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-info text-info"><i
                                                    class="bx bx-home-circle"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New Product Approved <span
                                                        class="msg-time float-end">2 hrs ago</span></h6>
                                                <p class="msg-info">Your new product has approved</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-danger text-danger"><i
                                                    class="bx bx-message-detail"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
												ago</span></h6>
                                                <p class="msg-info">New customer comments recived</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-success text-success"><i
                                                    class='bx bx-check-square'></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Your item is shipped <span
                                                        class="msg-time float-end">5 hrs
												ago</span></h6>
                                                <p class="msg-info">Successfully shipped your item</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-primary text-primary"><i
                                                    class='bx bx-user-pin'></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
												ago</span></h6>
                                                <p class="msg-info">24 new authors joined last week</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notify bg-light-warning text-warning"><i
                                                    class='bx bx-door-open'></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
												ago</span></h6>
                                                <p class="msg-info">45% less alerts last 4 weeks</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <a href="javascript:;">
                                    <div class="text-center msg-footer">View All Notifications</div>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
                                <i class='bx bx-comment'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:;">
                                    <div class="msg-header">
                                        <p class="msg-header-title">Messages</p>
                                        <p class="msg-header-clear ms-auto">Marks all as read</p>
                                    </div>
                                </a>
                                <div class="header-message-list">
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="manages/assets/images/avatars/avatar-1.png" class="msg-avatar"
                                                     alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
												ago</span></h6>
                                                <p class="msg-info">The standard chunk of lorem</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="manages/assets/images/avatars/avatar-2.png" class="msg-avatar"
                                                     alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
												sec ago</span></h6>
                                                <p class="msg-info">Many desktop publishing packages</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="manages/assets/images/avatars/avatar-3.png" class="msg-avatar"
                                                     alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
												ago</span></h6>
                                                <p class="msg-info">Various versions have evolved over</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="manages/assets/images/avatars/avatar-4.png" class="msg-avatar"
                                                     alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
												min ago</span></h6>
                                                <p class="msg-info">Making this the first true generator</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="manages/assets/images/avatars/avatar-5.png" class="msg-avatar"
                                                     alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
												ago</span></h6>
                                                <p class="msg-info">Duis aute irure dolor in reprehenderit</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="manages/assets/images/avatars/avatar-6.png" class="msg-avatar"
                                                     alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
												ago</span></h6>
                                                <p class="msg-info">The passage is attributed to an unknown</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="manages/assets/images/avatars/avatar-7.png" class="msg-avatar"
                                                     alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
												ago</span></h6>
                                                <p class="msg-info">The point of using Lorem</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="manages/assets/images/avatars/avatar-8.png" class="msg-avatar"
                                                     alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
												ago</span></h6>
                                                <p class="msg-info">It was popularised in the 1960s</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="manages/assets/images/avatars/avatar-9.png" class="msg-avatar"
                                                     alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
												ago</span></h6>
                                                <p class="msg-info">Various versions have evolved over</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="manages/assets/images/avatars/avatar-10.png" class="msg-avatar"
                                                     alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
												ago</span></h6>
                                                <p class="msg-info">If you are going to use a passage</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="manages/assets/images/avatars/avatar-11.png" class="msg-avatar"
                                                     alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
												ago</span></h6>
                                                <p class="msg-info">All the Lorem Ipsum generators</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <a href="javascript:;">
                                    <div class="text-center msg-footer">View All Messages</div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="user-box dropdown px-3">
                    <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{getPicturePath(auth()->user()->picture)}}" class="user-img" alt="user avatar">
                        <div class="user-info ps-3">
                            <p class="user-name mb-0">{{Str::limit(auth()->user()->name, 10)}}</p>
                            <p class="designattion mb-0">{{auth()->user()->getRole()}}</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
  {{--                      <li><a class="dropdown-item" href="{{route('users.account')}}"><i class="bx bx-user"></i><span>Mon compte</span></a>--}}
                        <li><a class="dropdown-item" ><i class="bx bx-user"></i><span>Mon compte</span></a>
                        </li>
                       {{-- <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
                        </li>--}}
                        <li><a class="dropdown-item" href="{{url('/consoles')}}"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                        </li>
                       {{-- <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                        </li>--}}
                       {{-- <li><a class="dropdown-item" href="javascript:;"><i
                                    class='bx bx-download'></i><span>Downloads</span></a>
                        </li>--}}
                        <li>
                            <div class="dropdown-divider mb-0"></div>
                        </li>
                        <li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="dropdown-item" href="javascript:;"><i class='bx bx-log-out-circle'></i><span>Deconnexion</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--end header -->
    <!--start page wrapper -->
