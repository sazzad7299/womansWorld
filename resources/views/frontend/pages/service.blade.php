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
<!-- Portfolio Area -->
<div class="tm-section tm-portfolio-area tm-padding-section bg-grey">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-9 col-12">
                <div class="tm-sectiontitle text-center">
                    <h2>Gallery</h2>
                    <span class="tm-sectiontitle-divider">
                        <img src="{{ asset('public/frontend/assets/images/section-divider-icon.png')}}" alt="section divider">
                    </span>
                    <p>Lorem ipsum dolor sittem ametamngcing elit, per sed do eiusmoad teimpor sittem elit
                        inuning ut sed sittem do eiusmod.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row tm-portfolio-wrapper mt-30-reverse">

            <!-- Single Portfolio -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mt-30">
                <div class="tm-portfolio tm-scrollanim">
                    <a href="{{ asset('public/frontend/assets/images/portfolio/portfolio-image-lg-1.jpg')}}"
                        data-fancybox="portfolio-gallery" data-caption="Self makeup at home">
                        <img src="{{ asset('public/frontend/assets/images/portfolio/portfolio-image-1.jpg')}}" alt="portfolio image">
                    </a>
                    <span class="tm-portfolio-icon"><i class="ti ti-fullscreen"></i></span>
                </div>
            </div>
            <!--// Single Portfolio -->

            <!-- Single Portfolio -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mt-30">
                <div class="tm-portfolio tm-scrollanim">
                    <a href="https://www.youtube.com/watch?v=mHUOCxVT5ro" data-fancybox="portfolio-gallery"
                        data-caption="Red Leapstick">
                        <img src="{{ asset('public/frontend/assets/images/portfolio/portfolio-image-5.jpg')}}" alt="portfolio image">
                    </a>
                    <span class="tm-portfolio-icon"><i class="ti-control-play"></i></span>
                </div>
            </div>
            <!--// Single Portfolio -->

            <!-- Single Portfolio -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mt-30">
                <div class="tm-portfolio tm-scrollanim">
                    <a href="{{ asset('public/frontend/assets/images/portfolio/portfolio-image-lg-2.jpg')}}"
                        data-fancybox="portfolio-gallery" data-caption="Leapstick">
                        <img src="{{ asset('public/frontend/assets/images/portfolio/portfolio-image-2.jpg')}}" alt="portfolio image">
                    </a>
                    <span class="tm-portfolio-icon"><i class="ti ti-fullscreen"></i></span>
                </div>
            </div>
            <!--// Single Portfolio -->

            <!-- Single Portfolio -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mt-30">
                <div class="tm-portfolio tm-scrollanim">
                    <a href="{{ asset('public/frontend/assets/images/portfolio/portfolio-image-lg-3.jpg')}}"
                        data-fancybox="portfolio-gallery" data-caption="Face Treatment">
                        <img src="{{ asset('public/frontend/assets/images/portfolio/portfolio-image-3.jpg')}}" alt="portfolio image">
                    </a>
                    <span class="tm-portfolio-icon"><i class="ti ti-fullscreen"></i></span>
                </div>
            </div>
            <!--// Single Portfolio -->

            <!-- Single Portfolio -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mt-30">
                <div class="tm-portfolio tm-scrollanim">
                    <a href="{{ asset('public/frontend/assets/images/portfolio/portfolio-image-lg-4.jpg')}}"
                        data-fancybox="portfolio-gallery" data-caption="Clean Face">
                        <img src="{{ asset('public/frontend/assets/images/portfolio/portfolio-image-4.jpg')}}" alt="portfolio image">
                    </a>
                    <span class="tm-portfolio-icon"><i class="ti ti-fullscreen"></i></span>
                </div>
            </div>
            <!--// Single Portfolio -->

            <!-- Single Portfolio -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mt-30">
                <div class="tm-portfolio tm-scrollanim">
                    <a href="{{ asset('public/frontend/assets/images/portfolio/portfolio-image-lg-6.jpg')}}"
                        data-fancybox="portfolio-gallery" data-caption="Cleaning Face">
                        <img src="{{ asset('public/frontend/assets/images/portfolio/portfolio-image-6.jpg')}}" alt="portfolio image">
                    </a>
                    <span class="tm-portfolio-icon"><i class="ti ti-fullscreen"></i></span>
                </div>
            </div>
            <!--// Single Portfolio -->

            <!-- Single Portfolio -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mt-30">
                <div class="tm-portfolio tm-scrollanim">
                    <a href="{{ asset('public/frontend/assets/images/portfolio/portfolio-image-lg-7.jpg')}}"
                        data-fancybox="portfolio-gallery" data-caption="Art Leapstick">
                        <img src="{{ asset('public/frontend/assets/images/portfolio/portfolio-image-7.jpg')}}" alt="portfolio image">
                    </a>
                    <span class="tm-portfolio-icon"><i class="ti ti-fullscreen"></i></span>
                </div>
            </div>
            <!--// Single Portfolio -->

            <!-- Single Portfolio -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mt-30">
                <div class="tm-portfolio tm-scrollanim">
                    <a href="{{ asset('public/frontend/assets/images/portfolio/portfolio-image-lg-8.jpg')}}"
                        data-fancybox="portfolio-gallery" data-caption="Skin treatment">
                        <img src="{{ asset('public/frontend/assets/images/portfolio/portfolio-image-8.jpg')}}" alt="portfolio image">
                    </a>
                    <span class="tm-portfolio-icon"><i class="ti ti-fullscreen"></i></span>
                </div>
            </div>
            <!--// Single Portfolio -->
        </div>
    </div>

</div>
<!--// Portfolio Area -->

@endsection
