<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('dashboard/favicon.ico')}}">
    <title>Dashboard</title>

    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/css/feather.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/dataTables.bootstrap4.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="{{asset('dashboard/css/app-dark.css')}}" id="darkTheme" disabled>
  </head>

  <body class="vertical  light  ">
    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <form class="form-inline mr-auto searchform text-muted">
          <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
        </form>
        <ul class="nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                <img src="{{asset('dashboard/./assets/avatars/face-1.jpg')}}" alt="..." class="avatar-img rounded-circle">
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Settings</a>
              <a class="dropdown-item" href="#">Activities</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
              </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
             </form>
            </div>
          </li>
        </ul>
      </nav>
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
            <img src="{{asset('dashboard/assets/images/Logo.png')}}" class="navbar-brand-img alt="" height="50" width="150">
            </a>    
                <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
              </svg>
            </a>
          </div>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="{{route('home')}}">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Dashboard</span>
              </a>
            </li>
            <p class="text-muted nav-heading mt-4 mb-1">
              <span>Data</span>
            </p>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{route('admin.index')}}">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">Product</span>
              </a>
            </li>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{route('partners.index')}}">
                <i class="fe fe-users fe-16"></i>
                <span class="ml-3 item-text">Investation</span>
              </a>
            </li>
            <p class="text-muted nav-heading mt-4 mb-1">
              <span>Details</span>
            </p>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{route('customers.index')}}">
                <i class="fe fe-star fe-16"></i>
                <span class="ml-3 item-text">Recap</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{route('complaint.index')}}">
                <i class="fe fe-message-square fe-16"></i>
                <span class="ml-3 item-text">Orders</span>
              </a>
            </li>
            <!--<li class="nav-item dropdown">
              <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-trending-up fe-16"></i>
                <span class="ml-3 item-text">Investation</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="tables">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./table_basic.html"><span class="ml-1 item-text">...</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./table_advanced.html"><span class="ml-1 item-text">...</span></a>
                </li>-->
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./table_datatables.html"><span class="ml-1 item-text">...s</span></a>
            </li>
          </ul>
        </nav>
      </aside>
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
                @yield('content')
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
      </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="{{asset('dashboard/js/jquery.min.js')}}"></script>
    <script src="{{asset('dashboard/js/popper.min.js')}}"></script>
    <script src="{{asset('dashboard/js/moment.min.js')}}"></script>
    <script src="{{asset('dashboard/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dashboard/js/simplebar.min.js')}}"></script>
    <script src="{{asset('dashboard/js/daterangepicker.js')}}"></script>
    <script src="{{asset('dashboard/js/jquery.stickOnScroll.js')}}"></script>
    <script src="{{asset('dashboard/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('dashboard/js/config.js')}}"></script>
    <script src="{{asset('dashboard/js/apps.js')}}"></script>
    <script src="{{asset('dashboard/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/js/dataTables.bootstrap4.min.js')}}></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
    @yield('script')
  </body>
</html>