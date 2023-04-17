<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Hygrowth</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('sign/css/simplebar.css')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('sign/css/feather.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('sign/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('sign/css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="{{asset('sign/css/app-dark.css')}}" id="darkTheme" disabled>
  </head>
  <body class="light ">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form method="POST" action="{{ route('login') }}" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
        @csrf
                        
                    </a>
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="#">
            <!--<svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">-->
            <img src="{{asset('sign/assets/Logo.png')}}" alt="" height="75" width="175">
              <g>
                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
              </g>
            </svg>
          </a>
          <h1 class="h5 mb-3">Sign in</h1>
          <div class="form-group">

            <div class="col">
                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            </div>
          <div class="form-group">

            <div class="col">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
        </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-lg btn-primary btn-block" >
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}" style=#198754;>
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
      </div>
    </div>
    <script src="{{asset('sign/js/jquery.min.js')}}"></script>
    <script src="{{asset('sign/js/popper.min.js')}}"></script>
    <script src="{{asset('sign/js/moment.min.js')}}"></script>
    <script src="{{asset('sign/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('sign/js/simplebar.min.js')}}"></script>
    <script src="{{asset('sign/js/daterangepicker.js')}}"></script>
    <script src="{{asset('sign/js/jquery.stickOnScroll.js')}}"></script>
    <script src="{{asset('sign/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('sign/js/config.js')}}"></script>
    <script src="{{asset('sign/js/apps.js')}}"></script>
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
  </body>
</html>