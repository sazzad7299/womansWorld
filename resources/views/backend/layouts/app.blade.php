<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png')}}" type="image/png" />
  <!--plugins-->
  <link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="{{ asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/css/bootstrap-extended.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/css/style.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/css/icons.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- loader-->
	<link href="{{ asset('backend/assets/css/pace.min.css')}}" rel="stylesheet" />
  <!--Theme Styles-->
  <link href="{{ asset('backend/assets/css/dark-theme.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/css/light-theme.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/css/semi-dark.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/assets/css/header-colors.css')}}" rel="stylesheet" />
  <title>@yield('title')</title>
  @stack('css')
</head>

<body>

  <!--start wrapper-->
  <div class="wrapper">

     @include('backend.layouts.topbar')
       <!--start sidebar -->
       @include('backend.layouts.sidebar')
       <!--end sidebar -->

       <!--start content-->
          <main class="page-content">
            @yield('content')
          </main>
       <!--end page main-->


       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <!--start switcher-->
       <div class="switcher-body">
        <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-paint-bucket me-0"></i></button>
        <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
          <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
          </div>
          <div class="offcanvas-body">
            <h6 class="mb-0">Theme Variation</h6>
            <hr>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" checked>
              <label class="form-check-label" for="LightTheme">Light</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
              <label class="form-check-label" for="DarkTheme">Dark</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3">
              <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
            </div>
            <hr>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme" value="option3">
              <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
            </div>
            <hr/>
            <h6 class="mb-0">Header Colors</h6>
            <hr/>
            <div class="header-colors-indigators">
              <div class="row row-cols-auto g-3">
                <div class="col">
                  <div class="indigator headercolor1" id="headercolor1"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor2" id="headercolor2"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor3" id="headercolor3"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor4" id="headercolor4"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor5" id="headercolor5"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor6" id="headercolor6"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor7" id="headercolor7"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor8" id="headercolor8"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>
       <!--end switcher-->

  </div>
  <!--end wrapper-->


  <!-- Bootstrap bundle JS -->
  <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
  <!--plugins-->
  <script src="{{ asset('backend/assets/js/jquery.min.js')}}"></script>
  <script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
  <script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
  <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
  <script src="{{ asset('backend/assets/js/pace.min.js')}}"></script>
  <!--app-->
  <script src="{{ asset('backend/assets/js/app.js')}}"></script>
  <script src="https://cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>
  @stack('js')
</body>

</html>
