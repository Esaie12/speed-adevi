<!doctype html>
<html lang="fr" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>{{env('APP_NAME')}} | {{$title ?? ''}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    @stack('styles')
    <!-- plugin css -->
    <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{asset('assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/toastr/toastr.css') }}" rel="stylesheet" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                        </div>


                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>

                        <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                id="page-header-notifications-dropdown" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                <i class='bx bx-bell fs-22'></i>
                                <span  class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">{{count(Auth::user()->unreadNotifications)}}<span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">

                                <div class="dropdown-head bg-primary bg-pattern rounded-top">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                                            </div>
                                            <div class="col-auto dropdown-tabs">
                                                <a href="{{ route('truncate_all_notifications') }}" class="text-white" >
                                                    <button type="button" class="btn btn-danger btn-sm btn-icon waves-effect waves-light" data-bs-toggle="tooltip"
                                                        data-bs-trigger="hover" data-bs-placement="top" title="Vider toutes les notifications">
                                                        <i class="ri-delete-bin-5-line"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-content position-relative" id="">
                                    <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                                        <div data-simplebar style="max-height: 300px;" class="pe-2">
                                            @foreach (Auth::user()->unreadNotifications as $notification)
                                            <div  class="text-reset notification-item d-block dropdown-item position-relative">
                                                <div class="d-flex">
                                                    <div class="flex-1">
                                                        {!! $notification->data['message'] !!}
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> {{ Carbon\Carbon::parse($notification->created_at)->translatedFormat('d F Y à H:i') }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                            <div class="my-3 text-center view-all">
                                                <button type="button"
                                                    class="btn btn-soft-success waves-effect waves-light">Voir toutes les Notifications <i
                                                        class="ri-arrow-right-line align-middle"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <!--img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar"-->

                                    <div class="rounded-circle header-profile-user"  style="background-color: #D3D3D3; color: #495057; line-height: 32px;">
                                        {{ strtoupper(substr(Auth::user()->firstname, 0, 1)) }}{{ strtoupper(substr(Auth::user()->lastname, 0, 1)) }}
                                    </div>

                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</span>
                                        <span
                                            class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Client</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="{{route('user_profil')}}"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Profile</span></a>
                                <a class="dropdown-item" href="{{route('help')}}"><i
                                        class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Aide</span></a>



                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-logout">Se déconnecter</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete
                                It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="{{route('user_dashboard')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="{{route('user_dashboard')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ $user_dashboard ?? '' }} " href="{{route('user_dashboard')}}" aria-expanded="false">
                                <i class="ri-honour-line"></i> <span>Tableau de bord</span>
                            </a>
                        </li>

                        <!--li class="nav-item">
                            <a class="nav-link menu-link {{ $beneficiaire_list ?? '' }} " href="{{route('beneficiaire_list')}}" aria-expanded="false">
                                <i class="ri-honour-line"></i> <span>Mes enfants</span>
                            </a>
                        </li-->

                        <li class="nav-item">
                            <a class="nav-link menu-link {{ $pack_list ?? '' }} " href="{{route('user_tranche')}}" aria-expanded="false">
                                <i class="ri-honour-line"></i> <span>Mes tranches</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link collapsed" href="{{route('user_dons_index')}}" >
                                <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Collectes de dons</span>
                                @if($dons >0)
                                <span class="badge badge-pill bg-danger" data-key="t-hot">{{$dons}}</span>
                                @endif
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Abonnement</span>
                            </a>
                            <div class="collapse menu-dropdown {{ $collapsed_sub ?? '' }} " id="sidebarDashboards">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item {{ $pack_list ?? '' }} ">
                                        <a href="{{route('user_subscription')}}" class="nav-link" >Mes abonnements</a>
                                    </li>
                                    <li class="nav-item {{ $pack_make ?? '' }} ">
                                        <a href="{{route('pack_list')}}" class="nav-link" >Faire un abonnement</a>
                                    </li>

                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->

                        <!--li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLanding">
                                <i class="ri-rocket-line"></i> <span data-key="t-landing">Transactions</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarLanding">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-one-page"> Mes transactions </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-nft-landing">Mes Factures </a>
                                    </li>
                                </ul>
                            </div>
                        </li-->

                        <li class="nav-item">
                            <a class="nav-link menu-link {{ $pack_list ?? '' }} " href="{{route('list_invoices_user')}}" aria-expanded="false">
                                <i class="ri-rocket-line"></i> <span data-key="t-landing">Mes Factures</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div id="render"></div>
                {{$slot}}
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())

                            </script> © {{env('APP_NAME')}}.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Designer & Developper par AKMTECH
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>


    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('assets/js/pages/dashboard-analytics.init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @stack('scripts')
    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    @stack('modals')

    <script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>

    @if (Session::has('success') && session('success') != 'success')
        <script>
            toastr.success(`{{ session('success') }}`, 'Succès', {
                "closeButton": true,
                "progressBar": true,
                "showDuration": "5000",
                "timeOut": "5000",
                positionClass: 'toast-top-right'
            })
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            toastr.error(`{{ session('error') }}`, 'Erreur', {
                "closeButton": true,
                "progressBar": true,
                "showDuration": "5000",
                "timeOut": "5000",
                positionClass: 'toast-top-right'
            })
        </script>
    @endif

</body>

</html>
