@extends('layouts.master')
@push('css')
@endpush
@section('frontend-content')
    <!-- Products Wrapper -->
    <div class="tm-products-area tm-section tm-padding-section bg-white">
        <div class="container">
            <!-- Product Details -->
            <div class="tm-prodetails">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-6 col-sm-10 col-12">
                        <div class="tm-prodetails-images">
                            <div class="tm-prodetails-largeimages">
                                <div class="tm-prodetails-largeimage">
                                    <a data-fancybox="tm-prodetails-imagegallery"
                                        href="{{ asset($product->display) }}"
                                        data-caption="Product Zoom Image 1">
                                        <img src="{{ asset('/public/frontend/assets/images/products/product-image-1.jpg') }}"
                                            alt="product image">
                                    </a>
                                </div>
                                <div class="tm-prodetails-largeimage">
                                    <a data-fancybox="tm-prodetails-imagegallery"
                                        href="{{ asset('/public/frontend/assets/images/products/product-image-2.jpg') }}"
                                        data-caption="Product Zoom Image 2">
                                        <img src="{{ asset('/public/frontend/assets/images/products/product-image-2.jpg') }}"
                                            alt="product image">
                                    </a>
                                </div>
                                <div class="tm-prodetails-largeimage">
                                    <a data-fancybox="tm-prodetails-imagegallery"
                                        href="{{ asset('/public/frontend/assets/images/products/product-image-3.jpg') }}"
                                        data-caption="Product Zoom Image 3">
                                        <img src="{{ asset('/public/frontend/assets/images/products/product-image-3.jpg') }}"
                                            alt="product image">
                                    </a>
                                </div>
                                <div class="tm-prodetails-largeimage">
                                    <a data-fancybox="tm-prodetails-imagegallery"
                                        href="{{ asset('/public/frontend/assets/images/products/product-image-1.jpg') }}"
                                        data-caption="Product Zoom Image 4">
                                        <img src="assets/images/products/product-image-1.jpg" alt="product image">
                                    </a>
                                </div>
                                <div class="tm-prodetails-largeimage">
                                    <a data-fancybox="tm-prodetails-imagegallery"
                                        href="{{ asset('/public/frontend/assets/images/products/product-image-2.jpg') }}"
                                        data-caption="Product Zoom Image 5">
                                        <img src="{{ asset('/public/frontend/assets/images/products/product-image-2.jpg') }}"
                                            alt="product image">
                                    </a>
                                </div>
                                <div class="tm-prodetails-largeimage">
                                    <a data-fancybox="tm-prodetails-imagegallery"
                                        href="{{ asset('/public/frontend/assets/images/products/product-image-3.jpg') }}"
                                        data-caption="Product Zoom Image 6">
                                        <img src="{{ asset('/public/frontend/assets/images/products/product-image-3.jpg') }}"
                                            alt="product image">
                                    </a>
                                </div>
                            </div>
                            <div class="tm-prodetails-thumbnails">
                                <div class="tm-prodetails-thumbnail">
                                    <img src="{{ asset('/public/frontend/assets/images/products/product-image-1-thumb.jpg') }}"
                                        alt="product image">
                                </div>
                                <div class="tm-prodetails-thumbnail">
                                    <img src="{{ asset('/public/frontend/assets/images/products/product-image-2-thumb.jpg') }}"
                                        alt="product image">
                                </div>
                                <div class="tm-prodetails-thumbnail">
                                    <img src="{{ asset('/public/frontend/assets/images/products/product-image-3-thumb.jpg') }}"
                                        alt="product image">
                                </div>
                                <div class="tm-prodetails-thumbnail">
                                    <img src="{{ asset('/public/frontend/assets/images/products/product-image-1-thumb.jpg') }}"
                                        alt="product image">
                                </div>
                                <div class="tm-prodetails-thumbnail">
                                    <img src="{{ asset('/public/frontend/assets/images/products/product-image-2-thumb.jpg') }}"
                                        alt="product image">
                                </div>
                                <div class="tm-prodetails-thumbnail">
                                    <img src="{{ asset('/public/frontend/assets/images/products/product-image-3-thumb.jpg') }}"
                                        alt="product image">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-7 col-lg-6 col-md-6 col-12">
                        <div class="tm-prodetails-content">
                            <h4 class="tm-prodetails-title">{{$product->name}}</h4>
                            <div class="tm-ratingbox">
                                <span class="is-active"><i class="ti ti-star"></i></span>
                                <span class="is-active"><i class="ti ti-star"></i></span>
                                <span class="is-active"><i class="ti ti-star"></i></span>
                                <span class="is-active"><i class="ti ti-star"></i></span>
                                <span><i class="ti ti-star"></i></span>
                            </div>
                            <p class="tm-prodetails-availability">Availalbe: <span>In Stock</span></p>
                            <div class="tm-prodetails-price">
                                <span><del><span class="currency_symbol">৳</span>75.99</del> <span
                                        class="currency_symbol">৳</span>59.99</span>
                            </div>
                            <p>Enim illo perspiciatis molestias. Quaerat labor iosam aut amet dolor.
                                Dolor impedit occaecati qui et aut excepturi libero.</p>
                            <div class="tm-prodetails-quantitycart">
                                <div class="tm-quantitybox">
                                    <input type="text" value="1">
                                </div>
                                <a href="#" class="tm-button tm-button-dark">Add To Cart</a>
                            </div>

                            <div class="tm-prodetails-categories">
                                <h6>Categories :</h6>
                                <ul>
                                    <li><a href="shop.html">Cosmetics</a></li>
                                    <li><a href="shop.html">Makeup</a></li>
                                </ul>
                            </div>

                            <div class="tm-prodetails-tags">
                                <h6>Tags :</h6>
                                <ul>
                                    <li><a href="shop.html">Brush</a></li>
                                    <li><a href="shop.html">Face</a></li>
                                    <li><a href="shop.html">Makeup</a></li>
                                </ul>
                            </div>

                            <div class="tm-prodetails-share">
                                <h6>Share :</h6>
                                <ul>
                                    <li><a href="#"><i class="ti ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti ti-twitter-alt"></i></a></li>
                                    <li><a href="#"><i class="ti ti-pinterest"></i></a></li>
                                    <li><a href="#"><i class="ti ti-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Product Details -->

            <!-- Product Details Description & Review -->
            <div class="tm-prodetails-desreview tm-padding-section-sm-top">
                <ul class="nav tm-tabgroup2" id="prodetails" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="prodetails-area1-tab" data-toggle="tab" href="#prodetails-area1"
                            role="tab" aria-controls="prodetails-area1" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="prodetails-area2-tab" data-toggle="tab" href="#prodetails-area2"
                            role="tab" aria-controls="prodetails-area2" aria-selected="false">Reviews
                            (1)</a>
                    </li>
                </ul>
                <div class="tab-content" id="prodetails-content">
                    <div class="tab-pane fade show active" id="prodetails-area1" role="tabpanel"
                        aria-labelledby="prodetails-area1-tab">
                        <div class="tm-prodetails-description">
                            <p>Dolorum excepturi eos vitae illo at. Quidem id laboriosam ullam
                                aspernatur ut dolorem at. Ex dicta sed praesentium. Deserunt est aut
                                neque. Enim laborum mollitia dicta quidem in rem. Totam natus debitis
                                ab eaque iste dolorum.</p>
                            <p>Rem facilis placeat et. Perspiciatis modi quaerat quis in sit odit.
                                Autem neque ipsum id. Fuga qui quia. Ut possimus voluptates vel
                                deserunt praesentium totam doloremque enim. Rerum facilis in.</p>
                            <ul>
                                <li><b>Brand Name:</b> Jodu</li>
                                <li><b>Model:</b> A-525</li>
                                <li><b>Material:</b> Iron</li>
                                <li><b>Size:</b> 52 inch</li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="prodetails-area2" role="tabpanel"
                        aria-labelledby="prodetails-area2-tab">
                        <div class="tm-prodetails-review">
                            <h5>1 Review For Cosmetic plastic compact powder</h5>
                            <div class="tm-comment-wrapper mb-50">
                                <!-- Comment Single -->
                                <div class="tm-comment">
                                    <div class="tm-comment-thumb">
                                        <img src="assets/images/author-image-1.png" alt="author image">
                                    </div>
                                    <div class="tm-comment-content">
                                        <h6 class="tm-comment-authorname"><a href="#">Kareem Todd</a>
                                        </h6>
                                        <span class="tm-comment-date">Wednesday, October 17, 2018 at
                                            4:00PM.</span>
                                        <div class="tm-ratingbox">
                                            <span class="is-active"><i class="ti ti-star"></i></span>
                                            <span class="is-active"><i class="ti ti-star"></i></span>
                                            <span class="is-active"><i class="ti ti-star"></i></span>
                                            <span class="is-active"><i class="ti ti-star"></i></span>
                                            <span><i class="ti ti-star"></i></span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                            sed do
                                            eiusmod
                                            tempor incididunt ut labore dolore magna aliqua. Ut enim ad
                                            minim
                                            veniam.</p>
                                    </div>
                                </div>
                                <!--// Comment Single -->
                            </div>

                            <h5>Add a review</h5>
                            <form action="#" class="tm-form">
                                <div class="tm-form-inner">
                                    <div class="tm-form-field">
                                        <div class="tm-ratingbox tm-ratingbox-input">
                                            <span class="is-active"><i class="ti ti-star"></i></span>
                                            <span class="is-active"><i class="ti ti-star"></i></span>
                                            <span class="is-active"><i class="ti ti-star"></i></span>
                                            <span class="is-active"><i class="ti ti-star"></i></span>
                                            <span><i class="ti ti-star"></i></span>
                                        </div>
                                    </div>
                                    <div class="tm-form-field tm-form-fieldhalf">
                                        <input type="text" placeholder="Your Name*" required="required">
                                    </div>
                                    <div class="tm-form-field tm-form-fieldhalf">
                                        <input type="Email" placeholder="Your Email*" required="required">
                                    </div>
                                    <div class="tm-form-field">
                                        <textarea name="product-review" cols="30" rows="5" placeholder="Your Review"></textarea>
                                    </div>
                                    <div class="tm-form-field">
                                        <button type="submit" class="tm-button">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!--// Product Details Description & Review -->

            <div class="tm-similliar-products tm-padding-section-sm-top">
                <h4 class="small-title">Similliar Products</h4>
                <div class="row mt-30-reverse">
                    <!-- Single Product -->
                    @foreach ($relatedProduct as $product)
                    <x-product>
                        @slot('product', $product)
                    </x-product>
                    @endforeach
                    <!--// Single Product -->
                </div>
            </div>
        </div>
    </div>
    <!--// Products Wrapper -->
@endsection
@push('js')
    <script src="{{ asset('public/frontend/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
@endpush
