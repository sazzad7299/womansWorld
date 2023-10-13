@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/service.css')}}">

@endpush
@section('frontend-content')
<!-- Body Treatment Start  -->
<div class="body-treatment-section tm-padding-section">
    <div class="container">
        <div class="row body-treatment-inner mb-5">
            <div class="col-lg-6 treatment-img">
                <div class="treatment-bg-img">
                    <img src="{{ asset('frontend/assets/images/services/bg.png')}}" alt="">
                </div>
                <div class="treatment-main-img">
                    <img src="{{ asset('frontend/assets/images/services/service1_1.png')}}" alt="">
                </div>
                <div class="treatment-sub-img">
                    <img src="{{ asset('frontend/assets/images/services/service1_2.png')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 treatment-content">
                <h2 class="treat-num">01.</h2>
                <h1>Body treatment</h1>
                <p> Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Quis pendisse ultrices gravida. Risus commodo viverra lacus vel
                    facilisis.</p>
                <p>
                <ul>
                    <li> Lorem ipsum dolor sit amet, consectetur.</li>
                    <li> Lorem ipsum dolor sit amet, consectetur.</li>
                    <li> Lorem ipsum dolor sit amet, consectetur.</li>
                    <li> Lorem ipsum dolor sit amet, consectetur.</li>
                </ul>
                </p>
                <div class="treat-btn"><button class="tm-button">READ MORE</button></div>
            </div>
        </div>
        <div class="row body-treatment-inner">
            <div class="col-lg-6 treatment-content">
                <h2 class="treat-num">01.</h2>
                <h1>Body treatment</h1>
                <p> Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Quis pendisse ultrices gravida. Risus commodo viverra lacus vel
                    facilisis.</p>
                <p>
                <ul>
                    <li> Lorem ipsum dolor sit amet, consectetur.</li>
                    <li> Lorem ipsum dolor sit amet, consectetur.</li>
                    <li> Lorem ipsum dolor sit amet, consectetur.</li>
                    <li> Lorem ipsum dolor sit amet, consectetur.</li>
                </ul>
                </p>
                <div class="treat-btn"><button class="tm-button">READ MORE</button></div>
            </div>
            <div class="col-lg-6 treatment-img">
                <div class="treatment-bg-img">
                    <img src="{{ asset('frontend/assets/images/services/bg.png')}}" alt="">
                </div>
                <div class="treatment-main-img">
                    <img src="{{ asset('frontend/assets/images/services/service1_1.png')}}" alt="">
                </div>
                <div class="treatment-sub-img">
                    <img src="{{ asset('frontend/assets/images/services/service1_2.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Body Treatment Start  -->

@endsection
