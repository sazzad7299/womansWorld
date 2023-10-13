<div id="tm-home-area" class="tm-header tm-header-sticky">
    <div class="tm-header-toparea">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-4">

                </div>
                <div class="col-md-4 text-center tm-header-top-logo">
                    <a href="index.html" class="tm-header-logo">
                        <img src="{{ asset('frontend/assets/images/logo.png')}}" alt="Woman's World">
                    </a>
                </div>
                <div class="col-md-4">
                    <ul class="tm-header-icons">
                        <li></li>
                        <li><a data-bs-toggle="offcanvas" href="#offcanvasCart" role="button"
                                aria-controls="offcanvasCart"><i class="ti ti-shopping-cart"></i></a></li>
                        <li><a href="wishlist.html"><i class="ti ti-heart"></i></a></li>
                        <li><a href="login-register.html"><i class="ti ti-user"></i></a></li>
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
                        <a href="index.html" class="tm-header-logo">
                            <img src="{{ asset('frontend/assets/images/logo.png')}}" alt="Woman's World">
                        </a>
                    </div>

                    <nav class="tm-header-nav">
                        <ul>
                            <li class="tm-header-nav-dropdown"><a href="#tm-shop-area">Salon Services</a>
                                <ul>
                                    <li><a href={{route("service")}}>Facials</a></li>
                                    <li><a href={{route("service")}}>Hair Cut</a></li>
                                    <li><a href={{route("service")}}>Hair Treatment</a></li>
                                    <li><a href={{route("service")}}>Monicure/Pedicure</a></li>
                                    <li><a href={{route("service")}}>Eyelash extension</a></li>
                                    <li><a href={{route("service")}}>Hair Color</a></li>
                                    <li><a href="product-details-leftsidebar.html">Straightening Treatment</a>
                                    </li>
                                    <li><a href="product-details-nosidebar.html">Nail Bar</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="tm-header-nav-dropdown"><a href={{route("service")}}>Asthetic
                                    Clinic</a>
                                <ul>
                                    <li><a href={{route("service")}}>PRP</a></li>
                                    <li><a href="blog-leftsidebar.html">TCA</a></li>
                                    <li><a href="blog-details.html">Laser/Mole Tatto Removal</a></li>
                                    <li><a href="blog-details-leftsidebar.html">Fat Reduction</a>
                                    </li>
                                    <li><a href={{route("service")}}>Semipermanent Makeup</a></li>
                                    <li><a href={{route("service")}}>Fillers/Botox</a></li>
                                </ul>
                            </li>
                            <li class="tm-header-nav-dropdown"><a href="products-leftsidebar.html">W.W
                                    Profetional</a>
                                <ul>
                                    <li><a href="index.html">Hare Care</a></li>
                                    <li><a href="about.html">Skin Care</a></li>
                                    <li><a href="portfolios.html">Body Care</a></li>
                                </ul>
                            </li>
                            <li class="tm-header-nav-dropdown"><a href="#">W.W Cosmetics</a>
                                <ul>
                                    <li><a href="products-leftsidebar.html">Hare Care</a></li>
                                    <li><a href="blog-leftsidebar.html">Face Mask</a></li>
                                    <li><a href="blog-details.html">Henna</a></li>
                                </ul>
                            </li>
                            <li class="tm-header-nav-dropdown"><a href="products-leftsidebar.html">Kona
                                    Cosmetics</a>
                                <ul>
                                    <li><a href="products-leftsidebar.html">Lipps</a></li>
                                    <li><a href="products-leftsidebar.html">Face</a></li>
                                    <li><a href="products-nosidebar.html">Eyes</a></li>
                                    <li><a href="products-4-column.html">Gleam and Glitz</a></li>
                                    <li><a href={{route("service")}}>Collection</a></li>
                                </ul>
                            </li>
                            <li class="tm-header-nav-dropdown"><a href="blog.html">Treand</a>
                                <ul>
                                    <li><a href="blog.html">Tip of the week</a></li>
                                    <li><a href="blog-leftsidebar.html">Look</a></li>
                                    <li><a href="blog-details.html">Farnaz Alam's</a></li>
                                </ul>
                            </li>

                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>

                    </nav>
                    <div class="tm-header-sticky-icons d-none">
                        <ul class="tm-header-icons">
                            <li></li>
                            <li><a data-bs-toggle="offcanvas" href="#offcanvasCart" role="button"
                                aria-controls="offcanvasCart"><i class="ti ti-shopping-cart"></i></a></li>
                            <li><a href="wishlist.html"><i class="ti ti-heart"></i></a></li>
                            <li><a href="login-register.html"><i class="ti ti-user"></i></a></li>
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
