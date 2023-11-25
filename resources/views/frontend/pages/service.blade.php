@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/service.css')}}">

@endpush
@section('frontend-content')
<!-- Body Treatment Start  -->
<div class="body-treatment-section tm-padding-section">
    <div class="container">
        <div class="row body-treatment-inner mb-5">
            <div class="col-lg-6 treatment-img">
                <div class="treatment-bg-img">
                    <img src="{{ asset('public/frontend/assets/images/services/bg.png')}}" alt="">
                </div>
                <div class="item-image">
                    <div class="tm-blog-thumb">
                        <div class="tm-blog-imageslider">
                            <img src="{{ asset('public/frontend/assets/images/services/service1.jpg')}}" alt="blog image">
                            <img src="{{ asset('public/frontend/assets/images/services/service2.jpg')}}" alt="blog image">
                            <img src="{{ asset('public/frontend/assets/images/services/service3.jpeg')}}" alt="blog image">
                        </div>
                    </div>
                    <!--<img src="{{ asset('public/frontend/assets/images/services/service1.jpg')}}" alt="">-->
                </div>
                {{-- <div class="treatment-main-img">
                    <img src="{{ asset('public/frontend/assets/images/services/service1_1.png')}}" alt="">
                </div>
                <div class="treatment-sub-img">
                    <img src="{{ asset('public/frontend/assets/images/services/service1_2.png')}}" alt="">
                </div> --}}
            </div>
            <div class="col-lg-6 treatment-content">
                <h2>V- Line Injection</h2>
                <p> The procedure involves a few tiny injections into the jaw muscle with a needle as fine as a human hair. This will have its effect on the muscle over the following 3 months.</p>
                <p>
                <ul>
                    <li> V- Line Injection Benefits .</li>
                    <li> V- Line Injection Benefits .</li>
                    <li> V- Line Injection Benefits .</li>
                    <li> V- Line Injection Benefits .</li>
                </ul>
                </p>
            </div>
        </div>
        <div class="row body-treatment-inner mb-5">
            <div class="col-lg-6 treatment-content">
                <h2>RF</h2>
                <p> The procedure involves a few tiny injections into the jaw muscle with a needle as fine as a human hair. This will have its effect on the muscle over the following 3 months.</p>
                <p>
                <ul>
                    <li> Tightening sagging or loose skin.</li>
                    <li> Lifting face to a V-shaped face.</li>
                    <li> Cellulite reduction and skin contouring</li>
                    <li> Improving skin tone.</li>
                </ul>
                </p>
            </div>
            <div class="col-lg-6 treatment-img">
                <div class="treatment-bg-img">
                    <img src="{{ asset('public/frontend/assets/images/services/bg.png')}}" alt="">
                </div>
                <div class="item-image">
                    <img src="{{ asset('public/frontend/assets/images/services/service2.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <div class="row body-treatment-inner mb-5">
            <div class="col-lg-6 treatment-img">
                <div class="treatment-bg-img">
                    <img src="{{ asset('public/frontend/assets/images/services/bg.png')}}" alt="">
                </div>
                <div class="item-image">
                    <img src="{{ asset('public/frontend/assets/images/services/service3.jpeg')}}" alt="">
                </div>
                {{-- <div class="treatment-main-img">
                    <img src="{{ asset('public/frontend/assets/images/services/service1_1.png')}}" alt="">
                </div>
                <div class="treatment-sub-img">
                    <img src="{{ asset('public/frontend/assets/images/services/service1_2.png')}}" alt="">
                </div> --}}
            </div>
            <div class="col-lg-6 treatment-content">
                <h2>Carbon Peel</h2>
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
            </div>
        </div>
        <div class="row body-treatment-inner mb-5">
            <div class="col-lg-6 treatment-content">
                <h2>Body treatment</h2>
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
            </div>
            <div class="col-lg-6 treatment-img">
                <div class="treatment-bg-img">
                    <img src="{{ asset('public/frontend/assets/images/services/bg.png')}}" alt="">
                </div>
                <div class="item-image">
                    <img src="{{ asset('public/frontend/assets/images/services/service1.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <div class="row body-treatment-inner mb-5">
            <div class="col-lg-6 treatment-img">
                <div class="treatment-bg-img">
                    <img src="{{ asset('public/frontend/assets/images/services/bg.png')}}" alt="">
                </div>
                <div class="item-image">
                    <img src="{{ asset('public/frontend/assets/images/services/service1.jpg')}}" alt="">
                </div>
                {{-- <div class="treatment-main-img">
                    <img src="{{ asset('public/frontend/assets/images/services/service1_1.png')}}" alt="">
                </div>
                <div class="treatment-sub-img">
                    <img src="{{ asset('public/frontend/assets/images/services/service1_2.png')}}" alt="">
                </div> --}}
            </div>
            <div class="col-lg-6 treatment-content">
                <h2>V- Line Injection</h2>
                <p> The procedure involves a few tiny injections into the jaw muscle with a needle as fine as a human hair. This will have its effect on the muscle over the following 3 months.</p>
                <p>
                <ul>
                    <li> Benefits no 1.</li>
                    <li> Benefits no 1.</li>
                    <li> Benefits no 1.</li>
                    <li> Benefits no 1.</li>
                </ul>
                </p>
            </div>
        </div>
        <div class="row body-treatment-inner">
            <div class="col-lg-6 treatment-content">

                <h2>Body treatment</h2>
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
            </div>
            <div class="col-lg-6 treatment-img">
                <div class="treatment-bg-img">
                    <img src="{{ asset('public/frontend/assets/images/services/bg.png')}}" alt="">
                </div>
                <div class="item-image">
                    <img src="{{ asset('public/frontend/assets/images/services/service1.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Body Treatment Start  -->
@endsection
