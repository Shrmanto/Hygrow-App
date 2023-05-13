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
        <form method="POST" action="{{ url('/register-user') }}" class="col-lg-6 col-md-8 col-10 mx-auto">
          @csrf
          <div class="mx-auto text-center my-4">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
            <img src="{{asset('sign/assets/Logo.png')}}" alt="" height="80" width="175">
                <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
              </svg>
            </a>
            <h3 class="my-3">Register</h3>
          </div>
          <div class="form-group">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" name="email" value="{{old('email')}}">
            @error('email')
            {{$message}}
            @enderror
          </div>
          <div class="form-row">
            <div class="form-group col">
              <label for="firstname">Name</label>
              <input type="text" id="firstname" class="form-control" name="name" value="{{old('name')}}">
              @error('name')
              {{$message}}
              @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="address">Address</label>
              <input type="text" id="address" class="form-control" name="address" value="{{old('address')}}">
              @error('address')
              {{$message}}
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="phoneNumber">Phone Number</label>
              <input type="text" id="phoneNumber" class="form-control" name="phone_number" value="{{old('phone_number')}}">
              @error('phone_number')
              {{$message}}
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="date_of_birth">Date of Birth</label>
              <input type="date" id="date_of_birth" class="form-control" name="date_of_birth" value="{{old('date_of_birth')}}">
              @error('date_of_birth')
              {{$message}}
              @enderror
            </div>
          </div>
          <hr class="my-4">
          <div class="row mb-4">
            <div class="col-md-6">
              <div class="form-group">
                <label for="inputPassword5">New Password</label>
                <input type="password" class="form-control" id="inputPassword5" name="password">
                @error('password')
                {{$message}}
                @enderror
              </div>
              <div class="form-group">
                <label for="inputPassword6">Confirm Password</label>
                <input type="password" class="form-control" id="inputPassword6" name="confirm">
                @error('pconfirm')
                {{$message}}
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <p class="mb-2">Password requirements</p>
              <p class="small text-muted mb-2"> To create a new password, you have to meet all of the following requirements: </p>
              <ul class="small text-muted pl-4 mb-0">
                <li> Minimum 8 character </li>
                <li>At least one special character</li>
                <li>At least one number</li>
                <li>Can’t be the same as a previous password </li>
              </ul>
            </div>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
          <p class="mt-5 mb-3 text-muted text-center">© 2020</p>
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
</body>
</html>