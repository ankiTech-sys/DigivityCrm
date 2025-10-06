<script type="text/javascript">
    $(document).ready(function(){
        setInterval(updateClock, 1000);
        updateClock();
    });
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
        document.getElementById('clock').innerHTML = strTime;
    }
    </script>
@php
    if (Auth::user() === null) {
        header("Location: " . route('login'));
        exit;
    }
@endphp

<header class="navbar navbar-header navbar-header-fixed">
    <a href="" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
    <div class="navbar-brand">
        <img src="https://digivity.in/assets/img/digivity-logo.png" style="height:50px;width:auto;" alt="">
    </div><!-- navbar-brand -->
    <div id="navbarMenu" class="navbar-menu-wrapper">
        <div class="navbar-menu-header">
            <img src="https://digivity.in/assets/img/digivity-logo.png" alt="">
            <a id="mainMenuClose" href=""><i data-feather="x"></i></a>
        </div><!-- navbar-menu-header -->
        <ul class="nav navbar-menu">
            <li class="nav-label pd-l-20 pd-lg-l-25 d-lg-none">Main Navigation</li>
            <li class="nav-item active"><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
            <li class="nav-item with-sub">
    <a href="Javascript:void(0)" class="nav-link">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package">
            <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
            <line x1="12" y1="22.08" x2="12" y2="12"></line>
        </svg> 
        Module
    </a>

    <div class="navbar-menu-sub mx-wd-400">
        <div class="row m-0 p-0">
            <a href="{{ route('admin.module.index') }}" class="col-lg-12 m-0 p-0 bd-1">
                <ul>
                    <li class="list-group-item d-flex align-items-center bd-0">
                        <div class="mg-r-15 p-2 rounded-10 bg-light">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTegXcqy7WeCj00_Jhycxj_Ow5psZMsioAqQNh3OL0jqfNdyKllr4e3Sd0a6F2wvAsV7x0&usqp=CAU" style="object-fit:cover;" class="wd-40">
                        </div>
                        <div>
                            <h6 class="tx-14 tx-inverse font-weight-normal tx-semibold mg-b-0">
                                Customer/Billing
                            </h6>
                            <span class="d-block tx-10 text-muted" style="line-height:1.2; margin-top:3px;">
                                Streamlined invoicing and customer management for Digivity Technology's business growth.
                            </span>
                        </div>
                    </li>
                </ul>
            </a>
        </div>

         <div class="row m-0 p-0">
            <a href="#" class="col-lg-12 m-0 p-0 bd-1">
                <ul>
                    <li class="list-group-item d-flex align-items-center bd-0">
                        <div class="mg-r-15 p-2 rounded-10 bg-light">
                            <img src="https://w7.pngwing.com/pngs/684/527/png-transparent-invoice-computer-icons-tax-finance-bank-text-logo-payment.png" class="wd-30">
                        </div>
                        <div>
                            <h6 class="tx-14 tx-inverse font-weight-normal tx-semibold mg-b-0">
                                Quatation Management
                            </h6>
                            <span class="d-block tx-10 text-muted" style="line-height:1.2; margin-top:3px;">
                                Streamlined invoicing and customer management for Quatation
                            </span>
                        </div>
                    </li>
                </ul>
            </a>
        </div>
    </div>
</li>

            <li class="nav-item with-sub">
                <a href="" class="nav-link"><i data-feather="layers"></i> Global Settings</a>
                <div class="navbar-menu-sub">
                    <div class="d-lg-flex">
                        <ul>
                        <li class="nav-label">Global Setting</li>
                              <li class="nav-sub-item">
                                <a href="{{ route('admin.global-setting.financialYear') }}"
                                    class="a nav-sub-link"><i data-feather="settings"></i> Define Financial Year</a>
                            </li>
                         
                            <li class="nav-sub-item">
                                <a href="{{ route('admin.global-setting.service-category') }}"
                                    class="a nav-sub-link"><i data-feather="home"></i> Define Service Category</a>
                            </li>
                         
                        </ul>
                        <ul>
                  <li class="nav-label">Certificate Setting</li>
               
                  <li class="nav-sub-item"><a href="template/classic/page-503.html" class="nav-sub-link"><i data-feather="file"></i> 503 Service Unavailable</a></li>
                  <li class="nav-sub-item"><a href="template/classic/page-505.html" class="nav-sub-link"><i data-feather="file"></i> 505 Forbidden</a></li>
            </ul>
                    </div>
                </div><!-- nav-sub -->
                
            </li>
            <li hidden class="nav-item"><a href="../../components/" class="nav-link"><i data-feather="box"></i>
                    Components</a></li>
            <li hidden class="nav-item"><a href="../../collections/" class="nav-link"><i data-feather="archive"></i>
                    Collections</a></li>
        </ul>
    </div><!-- navbar-menu-wrapper -->
    <div class="navbar-right">
        @php
            use Illuminate\Support\Carbon;
        @endphp
        <div class="dropdown dropdown-notification pt-1">
            <a href="javascript:void(0);" role="button" class="dropdown-link   d-none d-md-block"
                data-bs-toggle="dropdown" data-bs-display="static">
                <ul style="list-style-type:none;line-height:1.4;" class="w-100 ">
                    <li class="fw-bold" style="font-size:8px;">Financial Year :
                        {{ Session::get('financial_session') }}</li>
                    <li class="fw-bold" style="font-size:8px;">Today : {{ Carbon::today()->format('d-m-Y') }} </li>
                    <li class="fw-bold" style="font-size:8px;">Time : <span class="text-danger" id="clock"></span></li>
                    <li style="font-size:8px;"><a class="fw-bold d-none d-md-block text-danger" href="" data-bs-toggle="modal"
                            data-bs-target="#changeSession"><i class="far fa-calendar-check"></i> Change</a></li>
                </ul>
            </a><!-- dropdown-link -->
        </div><!-- dropdown -->
        <div class="dropdown dropdown-profile">
            <a href="" role="button"  class="text-center  dropdown-link" data-bs-toggle="dropdown"
                data-bs-display="static">
                <div class="avatar avatar-sm">
                  
                    <img src="{{ Auth::user()->user_image ? asset('storage/uploads/admins_images/'.Auth::user()->user_image) : asset('assets/newimage/user.png') }}" class="rounded-circle" alt="">
                </div>
                <span class="tx-semibold d-none d-md-block fw-bold text-dark fs-10 m-1 nowrap  mg-b-5">{{ Auth::user()->name ? Auth::user()->name : '' }}</span>
            </a><!-- dropdown-link -->
            <div class="dropdown-menu dropdown-menu-end">
                <div class="avatar avatar-lg mg-b-15">  <img src="{{ Auth::user()->user_image ? asset('storage/uploads/admins_images/'.Auth::user()->user_image) : asset('assets/newimage/user.png') }}" class="rounded-circle" alt="">
                </div>
                <h6 class="tx-semibold mg-b-5 ">{{ Auth::user()->name ? Auth::user()->name : '' }}</h6>
                <p class="mg-b-25 tx-12 tx-color-03">{{Auth::user()->role}}</p>


                <a id="sign_out" href="" class="dropdown-item"><i data-feather="log-out"></i>Sign Out</a>
            </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
    </div><!-- navbar-right -->
    <div class="navbar-search">
        <div class="navbar-search-header">
            <input type="search" class="form-control" placeholder="Type and hit enter to search...">
            <button class="btn"><i data-feather="search"></i></button>
            <a id="navbarSearchClose" href="" class="link-03 mg-l-5 mg-lg-l-10"><i data-feather="x"></i></a>
        </div><!-- navbar-search-header -->
        <div class="navbar-search-body">
            <label
                class="tx-10 tx-medium tx-uppercase tx-spacing-1 tx-color-03 mg-b-10 d-flex align-items-center">Recent
                Searches</label>
            <ul class="list-unstyled">
                <li><a href="dashboard-one.html">modern dashboard</a></li>
                <li><a href="app-calendar.html">calendar app</a></li>
                <li><a href="../../collections/modal.html">modal examples</a></li>
                <li><a href="../../components/el-avatar.html">avatar</a></li>
            </ul>

            <hr class="mg-y-30 bd-0">

            <label
                class="tx-10 tx-medium tx-uppercase tx-spacing-1 tx-color-03 mg-b-10 d-flex align-items-center">Search
                Suggestions</label>

            <ul class="list-unstyled">
                <li><a href="dashboard-one.html">cryptocurrency</a></li>
                <li><a href="app-calendar.html">button groups</a></li>
                <li><a href="../../collections/modal.html">form elements</a></li>
                <li><a href="../../components/el-avatar.html">contact app</a></li>
            </ul>
        </div><!-- navbar-search-body -->
    </div><!-- navbar-search -->
</header><!-- navbar -->

<body
    style=" background: linear-gradient(rgba(245, 247, 250, .65), rgba(245, 247, 250, .65)), url({{ asset('assets/newimage/bg-app.jpg') }}); background-size: 50%; "
    onload="display_ct();">
    <div class=" content-fixed">
        <div class="container-fluid p-2 p-md-3 m-0 p-0">

{{-- spinner --}}
<!--<div id="spinner-loader" class="spinner-border" role="status">-->
<!--    <span class="sr-only">Loading...</span>-->
<!--  </div>-->
  {{--spinner  --}}
            {{-- loader section start here --}}
            <div id="overlay"></div>
            <div id="ld" class="ld text-center" style="display: none;">
                <span class="loader"></span>
                <p style="font-size: 16px;" class="text-light fw-bold">Plase Wait...</p>
            </div>
            {{-- loader section start here --}}
