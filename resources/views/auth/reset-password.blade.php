@extends('auth.app')
@section('title', 'Forgot Password')
@section('content')

    <div class="main-wrapper" id="app">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <div class="auth-side-wrapper"
                                        style="background-image: url({{ asset('public/backend/assets/images/photos/img6.jpg') }})">

                                    </div>
                                </div>
                                <div class="col-md-8 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        @include('includes.error')
                                        <a href="{{ URL::to('/') }}"
                                            class="noble-ui-logo d-block mb-2">{{ __('ICT') }}<span>{{ __('BD') }}</span></a>
                                        <h5 class="text-muted fw-normal mb-4">
                                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                        </h5>
                                        <form class="forms-sample" method="POST" action="{{ route('password.update') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="userEmail"
                                                    class="form-label">{{ __('E-mail Address') }}</label>
                                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                                <input type="email" class="form-control" id="userEmail"
                                                    placeholder="{{ __('E-mail Address') }}" name="email"
                                                    value="{{ old('email', $request->email) }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="userPassword"
                                                    class="form-label">{{ __('Password') }}</label>
                                                <input type="password" class="form-control" id="userPassword"
                                                    placeholder="{{ __('Password') }}" name="password" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="userConfirmPassword"
                                                    class="form-label">{{ __('CONFIRM PASSWORD') }}</label>
                                                <input type="password" class="form-control" id="userConfirmPassword"
                                                    placeholder="{{ __('CONFIRM PASSWORD') }}"
                                                    name="password_confirmation" required>
                                            </div>
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">{{ __('Reset Password') }}</button>

                                            </div>
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
