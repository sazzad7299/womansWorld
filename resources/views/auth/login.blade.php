@extends('auth.app')
@section('title', 'Login')
@section('content')

    <div class="main-wrapper" id="app">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-6 pe-md-0">
                                    <div class="auth-left-wrapper" style="background-image: url({{asset('public/backend/assets/images/login.png')}}); ">

                                    </div>
                                </div>
                                <div class="col-md-6 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        @include('includes.error')
                                       <img src="{{asset('public/backend/assets/images/logo.png')}}" alt="" style="width:80%">
                                        <h5 class="text-muted fw-normal mb-4">
                                            {{ __('Welcome back! Log in to your account.') }}</h5>
                                        <form class="forms-sample" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="userEmail"
                                                    class="form-label">{{ __('E-mail Address') }}</label>
                                                <input type="email" class="form-control" id="userEmail"
                                                    placeholder="{{ __('E-mail Address') }}" name="email"
                                                    value="{{ old('email') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="userPassword"
                                                    class="form-label">{{ __('Password') }}</label>
                                                <input type="password" class="form-control" id="userPassword"
                                                    placeholder="{{ __('Password') }}" name="password">
                                            </div>
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="authCheck"
                                                    name="remember">
                                                <label class="form-check-label" for="authCheck">
                                                    {{ __('Remember me') }}
                                                </label>
                                            </div>
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">{{ __('Login') }}</button>

                                            </div>
                                            <a href="{{ route('password.request') }}"
                                                class="d-block mt-3 text-muted">{{ __('Forgot password? Click Here') }}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
