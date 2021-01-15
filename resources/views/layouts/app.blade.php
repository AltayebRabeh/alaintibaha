<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/slider.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('frontend/css/blog-home.css') }}" rel="stylesheet">
  @yield('css')
  <style>
        @import url('https://fonts.googleapis.com/css2?family=Almarai&family=Cairo:wght@200;300;400;600;700;900&display=swap');
        * {
            font-family: 'Almarai', sans-serif !important;
            font-family: 'Cairo', sans-serif;
        }
        @media (max-width: 767px) {
            .nav-item {
                margin-right: 20px;
            }
        }
  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{asset('images/logo.jpg') }}" style="height: 58px;">
    </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}">اخر الاخبار
              <span class="sr-only"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">الاكثر مشاهدة</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">شاركنا بارائك</a>
          </li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">تسجيل جديد</a>
                    </li>
                @endif
            @else
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                    <img class="img-profile rounded-circle" style="width:50px; hieght:50px"
                        src="{{ Auth::user()->photo ? url(Auth::user()->photo) : asset('backend/img/undraw_profile.svg') }}">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('profile') }}">
                        <i class="text-gray-400"></i>
                        الملف الشخصي
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            تسجيل خروج
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </li>
            @endguest
        </ul>
      </div>
    </div>
  </nav>
  <marquee direction="right" style="border-top: 2px solid #fff;
                                    background-color: #343a40;
                                    height: 35px;
                                    font-size: 20px;
                                    color: #ffffff;
                                    margin-top: 27px;">
      @foreach (App\Http\Controllers\Web\HomeController::breakingNews() as $news)
      <a style="text-decoration: none;color: #ccc;" href="{{ route('read', $news->id) }}">{{ $news->title }}</a> <i class="fa fa-car"> </i>
      @endforeach
  </marquee>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">


        @yield('content')

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">البحث</h5>
          <div class="card-body">
              <form action="{{ route('search') }}" method="GET">
              @csrf
                  <div class="input-group">

                    <input name="search" type="text" class="form-control" placeholder="ابحث عن ...">
                    <span class="input-group-append">
                        <input type="submit" class="btn btn-secondary" type="submit" value="بحث!"></input>
                    </span>
                  </div>

              </form>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">اهم الاخبار</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                @foreach (App\Http\Controllers\Web\HomeController::bestNews() as $key => $new)
                    @if($key == 3)
                      </ul>
                      <ul class="list-unstyled mb-0">
                    @endif
                    <li>
                      <a href="{{ route('read', $new->id) }}">{{ substr($new->title, 0, 10) }}</a>
                    </li>
                @endforeach

                </ul>
              </div>
              <div class="col-lg-6">
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">الاعلانات</h5>
          <div class="card-body">
              @if(App\Http\Controllers\Web\HomeController::ads())
            <span class="h6"><b>{{ App\Http\Controllers\Web\HomeController::ads()->title }}</b></span>
            <p class="h6">{!! App\Http\Controllers\Web\HomeController::ads()->subject !!}</p>
            <img src="{{ url(json_decode(App\Http\Controllers\Web\HomeController::ads()->photos)[0]) }}" style="height:300px; max-width:100%" class="d-block ml-auto">
            @endif
        </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">جميع الحقوق محفوظة &copy; لصحيفة الانتباهة 2021</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>


  <script src="{{ asset('js/slider.js') }}" defer></script>
  <script src="{{ asset('js/app.js') }}" defer></script>

  @yield('js')

</body>

</html>
