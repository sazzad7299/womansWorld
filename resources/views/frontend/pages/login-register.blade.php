@extends('layouts.master')
@push('css')

@endpush
@section('frontend-content')
     <!-- Login Register Area -->
     <div class="tm-section tm-login-register-area bg-white tm-padding-section">
        <div class="container">
            <div class="row">

                <div class="col-lg-6">
                    <form action="{{route('dashboard')}}" class="tm-form tm-login-form">
                        <h4>Login</h4>
                        <div class="tm-form-inner">
                            <div class="tm-form-field">
                                <label for="login-email">Username or email address*</label>
                                <input type="email" id="login-email" required="required">
                            </div>
                            <div class="tm-form-field">
                                <label for="login-password">Password*</label>
                                <input type="password" id="login-password" required="required">
                            </div>
                            <div class="tm-form-field">
                                <input type="checkbox" name="login-remember" id="login-remember">
                                <label for="login-remember">Remember Me</label>
                            </div>
                            <div class="tm-form-field">
                                <button type="submit" class="tm-button">Login</button>
                            </div>
                            <div class="tm-form-field">
                                <a href="#">Forgot your password?</a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6">
                    <form action="{{route('dashboard')}}" class="tm-form tm-register-form">
                        <h4>Create an account</h4>
                        <div class="tm-form-inner">
                            <div class="tm-form-field">
                                <label for="register-username">Username</label>
                                <input type="text" id="register-username" required="required">
                            </div>
                            <div class="tm-form-field">
                                <label for="register-email">Email address</label>
                                <input type="email" id="register-email" required="required">
                            </div>
                            <div class="tm-form-field">
                                <label for="register-password">Password</label>
                                <input type="password" id="register-password" name="register-pass"
                                    required="required">
                            </div>
                            <div class="tm-form-field">
                                <div>
                                    <input type="checkbox" id="register-pass-show" name="register-pass-show">
                                    <label for="register-pass-show">Show Password</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="register-terms" name="register-terms">
                                    <label for="register-terms">I have read and agree to the website <a
                                            href="#">terms and
                                            conditions</a></label>
                                </div>
                            </div>
                            <div class="tm-form-field">
                                <button type="submit" class="tm-button">Register</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--// Login Register Area -->
@endsection
