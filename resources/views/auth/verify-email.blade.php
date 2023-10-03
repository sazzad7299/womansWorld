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
                                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                        </h5>
                                        @if (session('status') == 'verification-link-sent')
                                            <h5 class="text-muted fw-normal mb-4">
                                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                            </h5>
                                        @endif
                                        <form class="forms-sample" method="POST"
                                            action="{{ route('verification.send') }}">
                                            @csrf

                                            <div>
                                                <button type="submit"
                                                    class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">{{ __('Resend Verification Email') }}'</button>

                                            </div>
                                        </form>
                                        <form class="forms-sample" method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <div>
                                                <button type="submit"
                                                    class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">{{ __('Log Out') }}'</button>

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
