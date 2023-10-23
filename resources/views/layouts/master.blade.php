<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Woman's World - Beauty Reigns, We Beautity</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" href="{{ asset('public/frontend/assets/images/section-divider-icon.png')}}">
    <link rel="shortcut icon" href="{{ asset('public/frontend/assets/images/section-divider-icon.png')}}">

    <!-- CSS FILES HERE -->
    <!-- inject:css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/vendors/meanmenu.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/vendors/slick.css')}}">
        <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/vendors/slick-theme.css')}}">
        <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/vendors/themify-icons.css')}}">
        <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/vendors/flaticon.css')}}">
        <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/vendors/twentytwenty.css')}}">
        <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/vendors/nice-select.css')}}">
        <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/vendors/jquery.fancybox.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/vendors/jquery.nstSlider.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css')}}">
        @stack('css')
    <!-- endinject -->
</head>

<body>

   <!-- Preloader -->
   <div class="tm-preloader">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="tm-preloader-logo">
                    <img src="{{ asset('public/frontend/assets/images/loder.gif')}}" alt="logo">
                </div>
            </div>
        </div>
    </div>
</div>
<!--// Preloader -->

<!-- Wrapper -->
<div id="wrapper" class="wrapper">

    @include('layouts.header')

    @if (request()->url() != "http://singlevendor.test")
    <x-breadcrumb></x-breadcrumb>
    @endif


    @yield('frontend-content')

   @include('layouts.footer')

    <!-- Product Quickview -->
        <x-quickview />
    <!--// Product Quickview -->
    <!-- Offcanvas Cart item  Start-->
    {{-- <x-cart :items="$cartItems" /> --}}
    <x-cart />
    <!-- Offcanvas Cart item  End-->

    <button id="back-top-top"><i class="ti ti-arrow-up"></i></button>


</div>
<!--// Wrapper -->

    <!-- JS FILES HERE -->

    <!-- inject:js -->
    <!-- <script src="assets/js/vendors/modernizr-3.7.1.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public/frontend/assets/js/vendors/jquery.meanmenu.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/vendors/slick.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/vendors/jquery.event.move.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/vendors/jquery.twentytwenty.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/vendors/jquery.nice-select.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/vendors/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/vendors/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/vendors/jquery.fancybox.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/vendors/instafeed.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/vendors/jquery.nstslider.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/vendors/scrollspy.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/vendors/ScrollMagic.min.js')}}"></script>
    <script src="{{ asset('public/frontend/assets/js/main.js')}}"></script>
    @stack('js')
    <!-- endinject -->
</body>

</html>
