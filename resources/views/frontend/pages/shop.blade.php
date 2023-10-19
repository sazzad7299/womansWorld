@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/service.css')}}">

@endpush
@section('frontend-content')
<!-- Body Shop Start  -->
<div class="tm-products-area tm-section tm-padding-section bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-12 order-1 order-lg-2">
                <form action="#" class="tm-shop-header">
                    <p class="tm-shop-countview">Showing 1 to 9 of 16 </p>
                    <select>
                        <option value="value">Default Sorting</option>
                        <option value="value">Name A-Z</option>
                        <option value="value">Date</option>
                        <option value="value">Best Sellers</option>
                        <option value="value">Trending</option>
                    </select>
                </form>
                <div class="tm-shop-products">
                    <div class="row mt-30-reverse">
                        <!-- Single Product -->
                        @foreach ($products as $product)
                        <div class="col-lg-4 col-md-4 col-sm-4 col-12 mt-30">
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
                <div class="tm-pagination mt-50">
                    <ul>
                        <li><a href="{{route('shop')}}"><i class="ti ti-angle-left"></i></a></li>
                        <li class="is-active"><a href="{{route('shop')}}">1</a></li>
                        <li><a href="{{route('shop')}}">2</a></li>
                        <li><a href="{{route('shop')}}">3</a></li>
                        <li><a href="{{route('shop')}}"><i class="ti ti-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-12 order-2 order-lg-1">
                <div class="widgets widgets-sidebar widgets-sidebar-left">

                    <!-- Single Widget -->
                    <div class="single-widget widget-categories">
                        <h6 class="widget-title">Categories</h6>
                        <ul>
                            <li><a href="{{route('shop')}}">Make up</a></li>
                            <li><a href="{{route('shop')}}">Leapstick</a></li>
                            <li><a href="{{route('shop')}}">Face Powder</a></li>
                            <li><a href="{{route('shop')}}">Eyeliner</a></li>
                            <li><a href="{{route('shop')}}">Maskara</a></li>
                            <li><a href="{{route('shop')}}">Foundation</a></li>
                        </ul>
                    </div>
                    <!--// Single Widget -->

                    <!-- Single Widget -->
                    <div class="single-widget widget-pricefilter">
                        <h6 class="widget-title">Filter by Price</h6>
                        <div class="widget-pricefilter-inner">
                            <div class="tm-rangeslider" data-range_min="0" data-range_max="800"
                                data-cur_min="200" data-cur_max="550">
                                <div class="tm-rangeslider-bar nst-animating"></div>
                                <span class="tm-rangeslider-leftgrip nst-animating" tabindex="0"></span>
                                <span class="tm-rangeslider-rightgrip nst-animating" tabindex="0"></span>
                            </div>
                            <div class="widget-pricefilter-actions">
                                <p class="widget-pricefilter-price">Price: $<span
                                        class="tm-rangeslider-leftlabel">308</span>
                                    - $<span class="tm-rangeslider-rightlabel">798</span></p>
                                <button class="widget-pricefilter-button">Filter</button>
                            </div>
                        </div>
                    </div>
                    <!--// Single Widget -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Body Shop Start  -->

@endsection
