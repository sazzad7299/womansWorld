@extends('layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/service.css') }}">
@endpush
@section('frontend-content')
    <!-- Wishlist Area -->
    <div class="tm-section wishlist-area bg-white tm-padding-section">
        <div class="container">

            <!-- Wishlist Table -->
            <div class="tm-wishlist-table table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th class="tm-wishlist-col-image" scope="col">Image</th>
                            <th class="tm-wishlist-col-productname" scope="col">Product</th>
                            <th class="tm-wishlist-col-price" scope="col">Price</th>
                            <th class="tm-wishlist-col-quantity" scope="col">Quantity</th>
                            <th class="tm-wishlist-col-addcart" scope="col">Add to Cart</th>
                            <th class="tm-wishlist-col-remove" scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="product-details.html" class="tm-wishlist-productimage">
                                    <img src="{{asset('public/frontend/assets/images/products/product-image-1-thumb.jpg')}}"
                                        alt="product image">
                                </a>
                            </td>
                            <td>
                                <a href="product-details.html" class="tm-cart-productname">Cosmetic plastic
                                    compact powder</a>
                            </td>
                            <td class="tm-wishlist-price">$75.00</td>
                            <td>
                                <div class="tm-quantitybox">
                                    <input type="text" value="1">
                                </div>
                            </td>
                            <td>
                                <a href="#" class="tm-button tm-button-small">Add to Cart</a>
                            </td>
                            <td>
                                <button class="tm-wishlist-removeproduct"><i class="ti ti-close"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="product-details.html" class="tm-wishlist-productimage">
                                    <img src="{{asset('public/frontend/assets/images/products/product-image-2-thumb.jpg')}}"
                                        alt="product image">
                                </a>
                            </td>
                            <td>
                                <a href="product-details.html" class="tm-wishlist-productname">Cosmetics and
                                    makeup
                                    brushes</a>
                            </td>
                            <td class="tm-wishlist-price">$75.00</td>
                            <td>
                                <div class="tm-quantitybox">
                                    <input type="text" value="1">
                                </div>
                            </td>
                            <td>
                                <a href="#" class="tm-button tm-button-small">Add to Cart</a>
                            </td>
                            <td>
                                <button class="tm-wishlist-removeproduct"><i class="ti ti-close"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="product-details.html" class="tm-wishlist-productimage">
                                    <img src="{{asset('public/frontend/assets/images/products/product-image-3-thumb.jpg')}}"
                                        alt="product image">
                                </a>
                            </td>
                            <td>
                                <a href="product-details.html" class="tm-wishlist-productname">Cosmetics and
                                    makeup
                                    brushes</a>
                            </td>
                            <td class="tm-wishlist-price">$78.00</td>
                            <td>
                                <div class="tm-quantitybox">
                                    <input type="text" value="1">
                                </div>
                            </td>
                            <td>
                                <a href="#" class="tm-button tm-button-small">Add to Cart</a>
                            </td>
                            <td>
                                <button class="tm-wishlist-removeproduct"><i class="ti ti-close"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--// Wishlist Table -->

        </div>
    </div>
    <!--// Wishlist Area -->
@endsection
