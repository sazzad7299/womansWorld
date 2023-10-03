<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="{{asset('public/backend/assets/plugins/core/core.css')}}">
	<link rel="stylesheet" href="{{asset('public/backend/assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('public/backend/assets/plugins/flag-icon-css/css/flag-icon.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/backend/assets/css/demo_1/style.css')}}">
  <link rel="shortcut icon" href="{{asset('public/backend/assets/images/fav.ico')}}" />
</head>
<body>
    @section('content')

    @show
    <script src="{{ asset('public/backend/assets/plugins/core/core.js') }}"></script>
	<script src="{{ asset('public/backend/assets/plugins/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('public/backend/assets/js/template.js') }}"></script>

</body>

</html>
