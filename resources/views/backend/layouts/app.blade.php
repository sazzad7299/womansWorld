<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title')</title>
  {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('public/backend/assets/images/fav.ico') }}">
  <link rel="stylesheet" href="{{ asset('public/backend/assets/plugins/core/core.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet"
      href="{{ asset('public/backend/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
  <!-- end plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('public/backend/assets/fonts/feather-font/css/iconfont.css') }}">
  <link rel="stylesheet" href="{{ asset('public/backend/assets/plugins/flag-icon-css/css/flag-icon.min.css') }}">
  <link href="{{ asset('public/backend/assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('public/backend/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <!-- endinject -->
  <link href="{{ asset('public/backend/assets/css/app.css') }}" rel="stylesheet" />
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{ asset('public/backend/assets/css/demo_1/style.css') }}">
  @stack('css')
  <style>
    .notification{
        position: absolute;
    z-index: 99999;
    color: white;
    top: -3px;
    right: 0;
    background: #cc1616;
    padding: 2px 8px;
    border-radius: 10px;
    }
  </style>
</head>
<body>
    <script src="{{ asset('public/backend/assets/js/spinner.js') }}"></script>

    <div class="main-wrapper" id="app">
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="{{ URL::to('/') }}" class="sidebar-brand" style="font-size: 20px;line-height:18px">
                    PERFUME <br><span>SOMAHAR</span>
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            @include('backend.layouts.sidebar')
        </nav>
        <nav class="settings-sidebar">
            <div class="sidebar-body">
              <a href="#" class="settings-sidebar-toggler">
                <i data-feather="settings"></i>
              </a>
              <h6 class="text-muted">Sidebar:</h6>
              <div class="form-group border-bottom">
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
                    Light
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
                    Dark
                  </label>
                </div>
              </div>
              {{-- <div class="theme-wrapper">
                <h6 class="text-muted mb-2">Light Theme:</h6>
                <a class="theme-item active" href="">
                  <img src="{{ asset('public/public/backend/assets/images/screenshots/light.jpg') }}" alt="light theme">
                </a>
                <h6 class="text-muted mb-2">Dark Theme:</h6>
                <a class="theme-item" href="">
                  <img src="{{ asset('public/public/backend/assets/images/screenshots/dark.jpg') }}" alt="light theme">
                </a>
              </div> --}}
            </div>
        </nav>
        <div class="page-wrapper">

            @include('backend.layouts.topbar')
            @section('content')

            @show
            <footer
                class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
                <p class="text-muted mb-1 mb-md-0">{{ __('Copyright ©') }} {{ date('Y') }} <a
                        href="https://www.ictbanglabd.com/" target="_blank">{{ __('ictbd') }}</a>.</p>
                <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm"
                        data-feather="heart"></i></p>
            </footer>
        </div>
    </div>
    <script src="{{ asset('public/backend/assets/plugins/core/core.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('public/backend/assets/plugins/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/backend/assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('public/backend/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('public/backend/assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('public/backend/assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/template.js') }}"></script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <script src="{{ asset('public/backend/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/data-table.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/select2.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });

        @if (session()->has('success') || session()->has('error'))
            @if (session()->has('error'))
                Toast.fire({
                    icon: 'error',
                    title: '{{ session('error') }}'
                })
            @else
                Toast.fire({
                    icon: 'success',
                    title: '{{ session('success') }}'
                })
            @endif
        @endif
    </script>

    @section('footer')

    @show
    @stack('js')

</body>

</html>
