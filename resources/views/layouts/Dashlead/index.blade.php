<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('/assets/img/brand/favicon.ico') }}" type="image/x-icon" />
    <title>Dashboard</title>
    <link href="{{ asset('/assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('/assets/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/plugins/typicons.font/typicons.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/plugins/feather/feather.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/custom-style.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/plugins/sidemenu/sidemenu.css') }}" rel="stylesheet">
    <!---Switcher css-->
    <link href="{{ asset('/assets/switcher/css/switcher.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/switcher/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</head>

<body>
    <!-- Sidemenu -->
    <div class="main-sidebar main-sidebar-sticky side-menu">
        <div class="sidemenu-logo">
            <a class="main-logo" href="">
                <img src="{{ asset('/assets/img/brand/logo-transparent-png.png') }}"
                    class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('/assets/img/brand/logo-transparent-png.png') }}" class="header-brand-img icon-logo"
                    alt="logo">
                <img src="{{ asset('/assets/img/brand/logo-transparent-png.png') }}"
                    class="header-brand-img desktop-logo theme-logo" alt="logo">
                <img src="{{ asset('/assets/img/brand/logo-transparent-png.png') }}"
                    class="header-brand-img icon-logo theme-logo" alt="logo">
            </a>
        </div>
        <div class="main-sidebar-body ">
            <ul class="nav">
                <li class="nav-label">Dashboard</li>
                <li class="nav-item ">
                    <a class="nav-link" href=""><i class="fe fe-airplay "></i><strong
                            class="sidemenu-label ">Dashboard</strong></a>
                </li>
                @if (Auth::user()->Is_admin == 1)
                    <li class="nav-label">CATEGORY</li>
                    <li class="nav-item">
                        <a class="nav-link with-sub " href="{{ url('#') }}"><i class="fa-solid fa-user"></i><span
                                class="sidemenu-label">CATEGORY </span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link " href="{{url('category/create')}}">Add Category</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link " href="{{url('category')}}">View Category</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-label">SUB CATEGORY</li>
                    <li class="nav-item">
                        <a class="nav-link with-sub " href="{{ url('#') }}"><i class="fa-solid fa-user"></i><span
                                class="sidemenu-label"> SUB CATEGORY </span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link " href="{{url('sub_category/create')}}">Add SubCategory</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link " href="{{url('sub_category')}}">View SubCategory</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-label">FAQS</li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="{{ url('#') }}"><i class="fa fa-question-circle"
                                                                              aria-hidden="true"></i><span class="sidemenu-label">FAQS </span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link " href="{{ url('/faq/create') }}">Add Faq</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link " href="{{ url('/faq') }}">View Faqs</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-label">VIDEOS</li>

                    <li class="nav-item">
                        <a class="nav-link with-sub " href=""><i class="fa fa-video-camera"
                                                                 aria-hidden="true"></i><span class="sidemenu-label">VIDEOS </span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link " href="{{ url('/upload_video/create') }}">Add Video</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link " href="{{ url('upload_video') }}">View Videos</a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-label">USER MANAGEMENT</li>
                    <li class="nav-item">
                        <a class="nav-link with-sub " href="{{ url('#') }}"><i class="fa-solid fa-user"></i><span
                                class="sidemenu-label">USER </span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link " href="{{ url('/user/create') }}">Add User</a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link " href="{{ url('/user') }}">View Users</a>
                            </li>
                        </ul>
                    </li>


                @else
                    <li class="nav-label">VIEDEOS</li>

                    <li class="nav-item">
                        <a class="nav-link with-sub " href=""><i class="fa fa-video-camera"
                                aria-hidden="true"></i><span class="sidemenu-label">VIDEOS </span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">

                            <li class="nav-sub-item">
                                <a class="nav-sub-link " href="{{ url('/upload_video') }}">View Videos</a>
                            </li>

                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <!-- End Sidemenu -->
    <!-- Main Content-->
    <div class="main-content side-content pt-0 ">
        <!-- Main Header-->
        <div class="main-header side-header sticky">
            <div class="container-fluid">
                <div class="main-header-left">
                    <a class="main-logo d-lg-none" href="">
                        <img src="{{ asset('/assets/img/brand/logo-transparent-png.png') }}"
                            class="header-brand-img desktop-logo" alt="logo">
                        <img src="{{ asset('/assets/img/brand/logo-transparent-png.png') }}"
                            class="header-brand-img icon-logo" alt="logo">
                        <img src="{{ asset('/assets/img/brand/logo-light.png') }}"
                            class="header-brand-img desktop-logo theme-logo" alt="logo">
                        <img src="{{ asset('/assets/img/brand/logo-transparent-png.png') }}"
                            class="header-brand-img icon-logo theme-logo" alt="logo">
                    </a>
                    <a class="main-header-menu-icon" href="{{ url('#') }}"
                        id="mainSidebarToggle"><span></span></a>
                </div>
                <div class="main-header-right">
                    <div class="dropdown d-md-flex">
                        <a class="nav-link icon full-screen-link">
                            <i class="fe fe-maximize fullscreen-button"></i>
                        </a>
                    </div>
                    <div class="dropdown main-profile-menu">
                        <a class="main-img-user" href="{{ url('#') }}"><img alt="avatar"
                                src="{{ asset('/assets/img/brand/676-6764065_default-profile-picture-transparent-hd-png-download-removebg-preview.png') }}"
                                style="border: 2px solid #8760fb; padding: 3px;") }}"></a>
                        <div class="dropdown-menu">
                            <div class="header-navheading">
                                <h6 class="main-notification-title">{{ Ucfirst(Auth::user()->user_name) }}</h6>
                            </div>

                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="fe fe-edit"></i> My Profile
                            </a>
                            <a class="dropdown-item border-top" href="{{ route('profile.edit') }}">
                                <i class="fe fe-user"></i> Edit Profile
                            </a>
                            <hr>
                            <form method="POST" action="{{ route('logout') }}" style="margin: 0; padding: 0;">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fe fe-power"></i> {{ __('Sign Out') }}
                                </x-dropdown-link>
                            </form>
                            {{-- <i class="fe fe-power"></i> --}}


                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Header-->
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">{{ 'Welcome ' . ucfirst(Auth::user()->user_name) }}
                    </h2>
                    <ol class="breadcrumb">
                    </ol>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="row row-sm">
                <div class="col-sm-12 col-xl-4 col-lg-6">
                    <div class="card custom-card">
                        <div class="card-body dash1">
                            <div class="d-flex">
                                <p class="mb-1 tx-inverse">Total Users</p>
                                <div class="ml-auto">
                                    <i class="fas fa-chart-line fs-20 text-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="dash-25">
                                    @php
                                        $users = DB::table('users')
                                            ->get()
                                            ->count();
                                        echo $users;
                                    @endphp
                                </h3>
                            </div>
                            <div class="progress mb-1">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                    class="progress-bar progress-bar-xs wd-70p" role="progressbar"></div>
                            </div>
                            {{-- <div class="expansion-label d-flex">
                                <span class="text-muted">Last Month</span>
                                <span class="ml-auto"><i class="fas fa-caret-up mr-1 text-success"></i>0.7%</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-4 col-lg-6">
                    <div class="card custom-card">
                        <div class="card-body dash1">
                            <div class="d-flex">
                                <p class="mb-1 tx-inverse">Total FAQs</p>
                                <div class="ml-auto">
                                    <i class="fab fa-rev fs-20 text-secondary"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="dash-25">
                                  {{$allfaqcount}}
                                </h3>
                            </div>
                            <div class="progress mb-1">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                    class="progress-bar progress-bar-xs wd-60p bg-secondary" role="progressbar">
                                </div>
                            </div>
                            {{-- <div class="expansion-label d-flex">
                                <span class="text-muted">Last Month</span>
                                <span class="ml-auto"><i class="fas fa-caret-down mr-1 text-danger"></i>0.43%</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-4 col-lg-6">
                    <div class="card custom-card">
                        <div class="card-body dash1">
                            <div class="d-flex">
                                <p class="mb-1 tx-inverse">Total Videos</p>
                                <div class="ml-auto">
                                    <i class="fas fa-dollar-sign fs-20 text-success"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="dash-25">{{$allVideo}}</h3>
                            </div>
                            <div class="progress mb-1">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70"
                                    class="progress-bar progress-bar-xs wd-50p bg-success" role="progressbar"></div>
                            </div>
                            {{-- <div class="expansion-label d-flex text-muted">
                                <span class="text-muted">Last Month</span>
                                <span class="ml-auto"><i class="fas fa-caret-down mr-1 text-danger"></i>1.44%</span>
                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>
            <!--End  Row -->

            <!-- Row -->
            <div class="row row-sm">
                <div class="col-sm-12 col-xl-12 col-lg-12">
                    <div class="card custom-card overflow-hidden">
                        <div class="card-body">
                            <div class="card-option d-flex">
                                <div>
                                    <h6 class="card-title mb-1">Overview of Sales Win/Lost</h6>
                                    <p class="text-muted card-sub-title">Comapred to last month sales.</p>
                                </div>
                                <div class="card-option-title ml-auto">
                                    <div class="btn-group p-0">
                                        <button class="btn btn-light btn-sm" type="button">Month</button>
                                        <button class="btn btn-outline-light btn-sm" type="button">Year</button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <canvas id="sales"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
    <!-- End Main Content-->
    <!-- Main Footer-->
    <div class="main-footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span>Copyright © 2019 <a href="{{ url('#') }}">Dashlead</a>. Designed by <a
                            href="{{ url('#') }}">Spruko</a> All rights
                        reserved.</span>
                </div>
            </div>
        </div>
    </div>
    <!--End Footer-->
    </div>

    <!-- End Page -->
    <!-- Back-to-top -->
    <a href="{{ url('#top') }}" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

    <!-- Jquery js-->
    <script src="{{ asset('/assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Ionicons js-->
    <script src="{{ asset('/assets/plugins/ionicons/ionicons.js') }}"></script>

    <!-- Chart.Bundle js-->
    <script src="{{ asset('/assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- index -->
    <script src="{{ asset('/assets/js/index.js') }}"></script>

    <!-- Perfect-scrollbar js-->
    <script src="{{ asset('/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <!-- Sidemenu js-->
    <script src="{{ asset('/assets/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- Switcher js-->
    <script src="{{ asset('/assets/switcher/js/switcher.js') }}"></script>
    <!-- Custom js-->
    <script src="{{ asset('/assets/js/custom.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/assets/js/sweat@alert.js') }}"></script>
    @if (Auth::user() && !session('dashboard_alert_shown'))
        <script>
            Swal.fire({
                toast: true,
                icon: "success",
                title: "Welcome to the dashboard..!",
                animation: false,
                position: "top-right",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            @php
                session(['dashboard_alert_shown' => true]);
            @endphp
        </script>
    @endif
</body>

</html>
