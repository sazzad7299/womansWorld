<div id="tm-home-area" class="tm-header tm-header-sticky">
    <div class="tm-header-toparea">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-4">

                </div>
                <div class="col-md-4 text-center tm-header-top-logo">
                    <a href="{{url('/')}}" class="tm-header-logo">
                        <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="Woman's World">
                    </a>
                </div>
                <div class="col-md-4">
                    <ul class="tm-header-icons">
                        <li></li>
                        <li><a data-bs-toggle="offcanvas" href="#offcanvasCart" role="button"
                                aria-controls="offcanvasCart"><i class="ti ti-shopping-cart"></i></a></li>
                        <li><a href="{{ route('wishlist') }}"><i class="ti ti-heart"></i></a></li>
                        <li><a href="{{ route('login-register') }}"><i class="ti ti-user"></i></a></li>
                        <li><button class="tm-header-searchtrigger"><i class="ti ti-search"></i></button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="tm-header-bottomarea">
        <div class="container-fluid">
            <div class="tm-header-bottominside">
                <div class="tm-header-searcharea">
                    <form>
                        <input type="text" placeholder="Enter search keyword..">
                        <button type="submit"><i class="ti ti-search"></i></button>
                    </form>
                    <button class="tm-header-searchclose"><i class="ti ti-close"></i></button>
                </div>
                <div class="tm-header-inner">
                    <div class="tm-header-sticky-logo d-none">
                        <a href="{{url('/')}}" class="tm-header-logo">
                            <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="Woman's World">
                        </a>
                    </div>

                    <nav class="tm-header-nav">
                        <ul>
                            <li class="tm-header-nav-dropdown"><a href="#tm-shop-area">Salon Services</a>
                                <ul>
                                    <li><a href={{ route('service') }}>Facials</a></li>
                                    <li><a href={{ route('service') }}>Hair Cut</a></li>
                                    <li><a href={{ route('service') }}>Hair Treatment</a></li>
                                    <li><a href={{ route('service') }}>Monicure/Pedicure</a></li>
                                    <li><a href={{ route('service') }}>Eyelash extension</a></li>
                                    <li><a href={{ route('service') }}>Hair Color</a></li>
                                    <li><a href="{{ route('service') }}">Straightening Treatment</a>
                                    </li>
                                    <li><a href="{{ route('service') }}">Nail Bar</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="tm-header-nav-dropdown"><a href={{ route('service') }}>Asthetic
                                    Clinic</a>
                                <ul>
                                    <li><a href={{ route('service') }}>PRP</a></li>
                                    <li><a href="{{ route('service') }}">TCA</a></li>
                                    <li><a href="{{ route('service') }}">Laser/Mole Tatto Removal</a></li>
                                    <li><a href="{{ route('service') }}">Fat Reduction</a>
                                    </li>
                                    <li><a href={{ route('service') }}>Semipermanent Makeup</a></li>
                                    <li><a href={{ route('service') }}>Fillers/Botox</a></li>
                                </ul>
                            </li>
                            <li class="tm-header-nav-dropdown"><a href="{{ route('shop') }}">W.W
                                    Professional</a>
                                <ul>
                                    <li><a href="{{ route('shop') }}">Hare Care</a></li>
                                    <li><a href="{{ route('shop') }}">Skin Care</a></li>
                                    <li><a href="{{ route('shop') }}">Body Care</a></li>
                                </ul>
                            </li>
                            <li class="tm-header-nav-dropdown"><a href="{{ route('shop') }}">W.W Cosmetics</a>
                                <ul>
                                    <li><a href="{{ route('shop') }}">Hare Care</a></li>
                                    <li><a href="{{ route('shop') }}">Face Mask</a></li>
                                    <li><a href="{{ route('shop') }}">Henna</a></li>
                                </ul>
                            </li>
                            <li class="tm-header-nav-dropdown"><a href="{{ route('shop') }}">Kona
                                    Cosmetics</a>
                                <ul>
                                    <li><a href="{{ route('shop') }}">Lipps</a></li>
                                    <li><a href="{{ route('shop') }}">Face</a></li>
                                    <li><a href="{{ route('shop') }}">Eyes</a></li>
                                    <li><a href="{{ route('shop') }}">Gleam and Glitz</a></li>
                                    <li><a href="{{ route('shop') }}">Collection</a></li>
                                </ul>
                            </li>
                            <li class="tm-header-nav-dropdown"><a href="{{route('blog')}}">Trend</a>
                                <ul>
                                    <li><a href="{{route('blog')}}">Tip of the week</a></li>
                                    <li><a href="{{route('blog')}}">Look</a></li>
                                    <li><a href="{{route('blog')}}">Farnaz Alam's</a></li>
                                </ul>
                            </li>

                            {{-- <li><a href="{{ route('contact') }}">Contact Us</a></li> --}}
                        </ul>

                    </nav>
                    <div class="tm-header-sticky-icons d-none">
                        <ul class="tm-header-icons">
                            <li></li>
                            <li><a data-bs-toggle="offcanvas" href="#offcanvasCart" role="button"
                                    aria-controls="offcanvasCart"><i class="ti ti-shopping-cart"></i></a></li>
                            <li><a href="{{ route('wishlist') }}"><i class="ti ti-heart"></i></a></li>
                            <li><a href="{{ route('login-register') }}"><i class="ti ti-user"></i></a></li>
                            <li><button class="tm-header-searchtrigger"><i class="ti ti-search"></i></button>
                            </li>
                        </ul>
                    </div>

                    <div class="tm-mobilenav"></div>
                </div>
            </div>
        </div>
    </div>
</div>
