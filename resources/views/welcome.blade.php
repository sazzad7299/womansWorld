@extends('layouts.master')
@section('frontend-content')
 <!-- Heroslider Area -->
 <div class="tm-heroslider-area">

    <div class="tm-heroslider-slider">

        <!-- Heroslider Item -->
        <div class="tm-heroslider" data-bgimage="{{asset('frontend/assets/images/slider1.jpeg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-9">
                        <div class="tm-heroslider-contentwrapper">
                            <div class="tm-heroslider-content">
                                <h1>A thing of beauty is a joy forever for women</h1>
                                <p>The experience of beauty often involves an interpretation of some
                                    entity as being in balance.</p>
                                    <a href="{{route('shop')}}" class="tm-button">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Heroslider Item -->

        <!-- Heroslider Item -->
        <div class="tm-heroslider text-white" data-bgimage="{{ asset('frontend/assets/images/slider2.jpeg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-9">
                        <div class="tm-heroslider-contentwrapper">
                            <div class="tm-heroslider-content">
                                <h1>Beauty have changed greatly over the years</h1>
                                <p>The experience of beauty often involves an interpretation of some
                                    entity as being in balance.</p>
                                <a href="{{route('shop')}}" class="tm-button">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Heroslider Item -->

        <!-- Heroslider Item -->
        <div class="tm-heroslider text-white" data-bgimage="{{('frontend/assets/images/slider3.jpeg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-9">
                        <div class="tm-heroslider-contentwrapper">
                            <div class="tm-heroslider-content">
                                <h1>Beauty is first and foremost an emotion</h1>
                                <p>The experience of beauty often involves an interpretation of some
                                    entity as being in balance.</p>
                                    <a href="{{route('shop')}}" class="tm-button">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Heroslider Item -->

    </div>

    <ul class="tm-heroslider-social">
        <li><a href="#" title="facebook"><i class="ti ti-facebook"></i></a>
            <span class="tm-heroslider-social-tooltip">Facebook</span>
        </li>
        <li><a href="#" title="twitter"><i class="ti ti-twitter-alt"></i></a>
            <span class="tm-heroslider-social-tooltip">Twitter</span>
        </li>
        <li><a href="#" title="pinterest"><i class="ti ti-pinterest"></i></a>
            <span class="tm-heroslider-social-tooltip">Pinterest</span>
        </li>
    </ul>

</div>
<!--// Heroslider Area -->

<!-- Page Content -->
<main class="page-content">
   <!-- Brand Area -->
   <section id="tm-brand-area" class="container tm-section tm-brand-area tm-padding-section">
     <div class="row">

        <div class="col-lg-4 col-md-6 col-12">
            <div class="text-center tm-scrollanim category-banar">
                <div class="image">
                    <img src="https://templates.g5plus.net/glowing-bootstrap-5/assets/images/banner/banner-08.jpg" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="middle">
                    <div class="content">
                        <h5>W.W Profetional</h5>
                    <a href="{{route('shop')}}" class="tm-readmore tm-readmore-dark">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="text-center tm-scrollanim category-banar">
                <div class="image">
                    <img src="https://templates.g5plus.net/glowing-bootstrap-5/assets/images/banner/banner-06.jpg" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="middle">
                    <div class="content">
                        <h5>W.W Cosmetics</h5>
                    <a href="{{route('shop')}}" class="tm-readmore tm-readmore-dark">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="text-center tm-scrollanim category-banar">
                <div class="image">
                    <img src="https://templates.g5plus.net/glowing-bootstrap-5/assets/images/banner/banner-07.jpg" alt="">
                    <div class="overlay"></div>
                </div>
                <div class="middle">
                    <div class="content">
                        <h5>Kona Cosmetics</h5>
                        <a href="{{route('shop')}}" class="tm-readmore tm-readmore-dark">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
     </div>
   </section>
   <!-- Brand Area -->
    <!-- About Area -->
    <section id="tm-about-area" class="tm-section tm-about-area tm-padding-section bg-white"
        data-bgimage="{{ asset('frontend/assets/images/about-bg-image.png')}}" data-white-overlay="8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-9 col-12">
                    <div class="tm-sectiontitle text-center">
                        <h2>About Us</h2>
                        <span class="tm-sectiontitle-divider">
                            <img src="{{ asset('frontend/assets/images/section-divider-icon.png')}}" alt="section divider">
                        </span>
                        <p>Lorem ipsum dolor sittem ametamngcing elit, per sed do eiusmoad teimpor sittem elit
                            inuning ut sed sittem do eiusmod.</p>
                    </div>
                </div>
            </div>
            <div class="tm-about tm-scrollanim" data-bgimage="{{ asset('frontend/assets/images/about-block-background.jpg')}}">
                <div class="row">
                    <div class="col-xl-7 col-lg-8">
                        <h3>Welcome to Woman's World beauty</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ncididunt
                            ametfh consectetur.</p>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form by injected humour or randomised words which don't
                            look even slightly believable. If you are going to use a passage of Lorem Ipsum, you
                            need to be sure there isn't anything embarrassing.</p>
                        {{-- <a href="#" class="tm-button">Read more</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// About Area -->

    <!-- Service Area -->
    <div id="tm-service-area" class="tm-section tm-service-area tm-padding-section bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-9 col-12">
                    <div class="tm-sectiontitle text-center">
                        <h2>Our Populer Services</h2>
                        <span class="tm-sectiontitle-divider">
                            <img src="{{ asset('frontend/assets/images/section-divider-icon.png')}}" alt="section divider">
                        </span>
                        <p>Lorem ipsum dolor sittem ametamngcing elit, per sed do eiusmoad teimpor sittem elit
                            inuning ut sed sittem do eiusmod.</p>
                    </div>
                </div>
            </div>
            <div class="row no-gutters tm-service-wrapper">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="tm-service text-center tm-scrollanim">
                        <span class="tm-service-icon">
                            <i class="flaticon-make-up"></i>
                        </span>
                        <h5>Make up</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus tincidunt
                            ultrices utquis blandit dolor.</p>
                        <a href="#" class="tm-readmore tm-readmore-dark">Explore more</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="tm-service text-center tm-scrollanim">
                        <span class="tm-service-icon">
                            <i class="flaticon-facial-mask"></i>
                        </span>
                        <h5>Facial mask</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus tincidunt
                            ultrices utquis blandit dolor.</p>
                        <a href="#" class="tm-readmore tm-readmore-dark">Explore more</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="tm-service text-center tm-scrollanim">
                        <span class="tm-service-icon">
                            <i class="flaticon-skin-care"></i>
                        </span>
                        <h5>Skin care</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus tincidunt
                            ultrices utquis blandit dolor.</p>
                        <a href="#" class="tm-readmore tm-readmore-dark">Explore more</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="tm-service text-center tm-scrollanim">
                        <span class="tm-service-icon">
                            <i class="flaticon-liner"></i>
                        </span>
                        <h5>Liner</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus tincidunt
                            ultrices utquis blandit dolor.</p>
                        <a href="#" class="tm-readmore tm-readmore-dark">Explore more</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="tm-service text-center tm-scrollanim">
                        <span class="tm-service-icon">
                            <i class="flaticon-makeup"></i>
                        </span>
                        <h5>Special event make up</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus tincidunt
                            ultrices utquis blandit dolor.</p>
                        <a href="#" class="tm-readmore tm-readmore-dark">Explore more</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="tm-service text-center tm-scrollanim">
                        <span class="tm-service-icon">
                            <i class="flaticon-rent"></i>
                        </span>
                        <h5>Asthetic Clinic</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus tincidunt
                            ultrices utquis blandit dolor.</p>
                        <a href="#" class="tm-readmore tm-readmore-dark">Explore more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Service Area -->
    <!-- Offer Area -->
    <div class="tm-section tm-offer-area tm-padding-section bg-grey">
        <div class="container">
            {{-- <div class="row align-items-center">
                <div class="col-lg-6 col-12 order-2 order-lg-1">
                    <div class="tm-offer-left tm-scrollanim">
                        <h1>Deal of the Month</h1>
                        <h3>Get <span>40%</span> discount</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diamusus nonummy nibh
                            euismod tincidunt ut laoreet dolore magn aliquam erat volutpat. Ut wisi enim ad min
                            que. Pellent maximus exet velit tincidunt in pharetra</p>
                        <a href="contact.html" class="tm-button">Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tm-beforeafter">
                        <div class="tm-beforeafter-image">
                            <img src="{{ asset('frontend/assets/images/services/service1.jpg')}}" alt="before image">
                            <img src="{{ asset('frontend/assets/images/services/service2.jpg')}}" alt="after image">
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="tm-offer-left tm-scrollanim text-center">
                <h2>Kona By Farnaz Alam</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>
            </div>
            17,31,48
            <div class="tm-shop-products">
                <div class="row mt-30-reverse">
                    <!-- Single Product -->
                    @foreach ($products as $product)
                    <div class="col-lg-3 col-md-3 col-sm-4 col-12 mt-30">
                        <div class="tm-product tm-scrollanim">
                            <div class="tm-product-topside">
                                <img src="{{ asset($product->display)}}"
                                    alt="product image">
                                <ul class="tm-product-actions">
                                    <li><button data-fancybox data-src="#tm-product-quickview"><i
                                                class="ti ti-eye"></i></button></li>
                                    {{-- <li><a href="#"><i class="ti ti-shopping-cart"></i></a></li> --}}
                                    <li><a href="#"><i class="ti ti-heart"></i></a></li>

                                </ul>
                                <ul class="tm-product-addToCart">
                                    <li><a href="{{route('cart')}}" class="widget-pricefilter-button">Add to Cart <i class="ti ti-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="tm-product-bottomside text-center">
                                <h6 class="tm-product-title"><a href="{{route("product-details")}}">Cosmetic
                                        plastic compact
                                        powder</a></h6>
                                <span class="tm-product-price"><del><span class="currency_symbol">৳</span> 109.50</del> <span class="currency_symbol">৳</span> 99.99</span>
                                <div class="tm-ratingbox">
                                    <span class="is-active"><i class="ti ti-star"></i></span>
                                    <span class="is-active"><i class="ti ti-star"></i></span>
                                    <span class="is-active"><i class="ti ti-star"></i></span>
                                    <span class="is-active"><i class="ti ti-star"></i></span>
                                    <span><i class="ti ti-star"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--// Single Product -->

                </div>
            </div>
        </div>
    </div>
    <!--// Offer Area -->

    <!-- Testimonial Area -->
    <div class="tm-section tm-testimonial-area tm-padding-section bg-white" data-white-overlay="8"
        data-bgimage="{{ asset('frontend/assets/images/testimonial-bg-image.png')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-9 col-12">
                    <div class="tm-sectiontitle text-center">
                        <h2>Why We Are Best... ?</h2>
                        <span class="tm-sectiontitle-divider">
                            <img src="{{ asset('frontend/assets/images/section-divider-icon.png')}}" alt="section divider">
                        </span>
                        <p>Lorem ipsum dolor sittem ametamngcing elit, per sed do eiusmoad teimpor sittem elit
                            inuning ut sed sittem do eiusmod.</p>
                    </div>
                </div>
            </div>
            <div class="tm-testimonial-wrapper tm-testimonial-slider tm-scrollanim">

                <!-- Testimonial Single -->
                <div class="tm-testimonial">
                    <span class="tm-testimonial-authorimage">
                        <img src="{{ asset('frontend/assets/images/author-image-1.png')}}" alt="author image">
                    </span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin porttitor nisl nec ex
                        consectetur quis ornare sem molestie. Sed suscipit sollicitudin nulla tempor congue.
                        Integer sed elementum odio. Quisque ullamcorper quis sapien eget lobortis. Vivamus
                        sodales varius turpis.</p>
                    <div class="tm-testimonial-author">
                        <h6>Taslima Chowdhury Kona Alam</h6>
                        <span>Designation</span>
                    </div>
                </div>
                <!--// Testimonial Single -->

                <!-- Testimonial Single -->
                <div class="tm-testimonial">
                    <span class="tm-testimonial-authorimage">
                        <img src="{{ asset('frontend/assets/images/author-image-2.png')}}" alt="author image">
                    </span>
                    <p>Suscipit nobis quo ut qui rerum. Quia fugit voluptate quis totam. Iure qui dolorem
                        quisquam placeat facilis ut et. Nisi et necessitatibus sequi cumque. Quasi laudantium
                        asperiores et qui voluptas odio. Eum quo nam distinctio. Aut atque perspiciatis nobis id
                        non modi maxime repellendus et.</p>
                    <div class="tm-testimonial-author">
                        <h6>Farnaz Alam</h6>
                        <span>Designation</span>
                    </div>
                </div>
                <!--// Testimonial Single -->

                <!-- Testimonial Single -->
                <div class="tm-testimonial">
                    <span class="tm-testimonial-authorimage">
                        <img src="{{ asset('frontend/assets/images/author-image-3.png')}}" alt="author image">
                    </span>
                    <p>Et illum consequatur. Optio sunt et aut. Voluptatem assumenda maiores aut vitae ut.
                        Pariatur placeat necessitatibus modi vero enim velit. Qui error qui eligendi
                        reprehenderit rem autem. Laboriosam accusantium a. Unde magnam dolorem occaecati. Qui
                        earum architecto expedita.</p>
                    <div class="tm-testimonial-author">
                        <h6>Thamina Alam</h6>
                        <span>Designation</span>
                    </div>
                </div>
                <!--// Testimonial Single -->

            </div>
        </div>
    </div>
    <!--// Testimonial Area -->

    <!-- Subscribe Area -->
    {{-- <div class="tm-section tm-subscribe-area tm-padding-section bg-grey"
        data-bgimage="{{ asset('frontend/assets/images/subscribe-bg-image.png')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-md-10 col-12">
                    <div class="tm-subscribe tm-scrollanim">
                        <h3>Subscribe to our Newsletter</h3>
                        <p>If you have any questions, you can contact with us so that we can give you a
                            satisfying
                            answer.</p>
                        <form id="tm-mailchimp-form" class="tm-subscribe-form">
                            <input id="mc-email" type="email" placeholder="Email address...">
                            <button id="mc-submit" type="submit" class="tm-button"><i
                                    class="flaticon-paper-plane"></i></button>
                        </form>
                        <!-- Mailchimp Alerts -->
                        <div class="tm-mailchimp-alerts">
                            <div class="tm-mailchimp-submitting"></div>
                            <div class="mailchimp-success"></div>
                            <div class="tm-mailchimp-error"></div>
                        </div>
                        <!--// Mailchimp Alerts -->

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--// Subscribe Area -->

</main>
<!--// Page Content -->
@endsection
