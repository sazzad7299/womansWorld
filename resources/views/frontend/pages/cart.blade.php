@extends('layouts.master')
@push('css')

@endpush
@section('frontend-content')
    <!-- Shopping Cart Area -->
    <div class="tm-section shopping-cart-area bg-white tm-padding-section">
        <div class="container">

            <!-- Shopping Cart Table -->
            <div class="tm-cart-table table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th class="tm-cart-col-image" scope="col">Image</th>
                            <th class="tm-cart-col-productname" scope="col">Product</th>
                            <th class="tm-cart-col-price" scope="col">Price</th>
                            <th class="tm-cart-col-quantity" scope="col">Quantity</th>
                            <th class="tm-cart-col-total" scope="col">Total</th>
                            <th class="tm-cart-col-remove" scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $item)
                        <tr>
                            <td>
                                <a href="product-details.html" class="tm-cart-productimage">
                                    <img src="{{asset($item->options->image)}}"
                                        alt="product image">
                                </a>
                            </td>
                            <td>
                                <a href="" class="tm-cart-productname">{{$item->name}}</a>
                            </td>
                            <td class="tm-cart-price"><span class="currency_symbol">৳</span>{{$item->price}}</td>
                            <td>
                                <div class="tm-quantitybox">
                                    <input type="text" value="1">
                                </div>
                            </td>
                            <td>
                                <span class="tm-cart-totalprice"><span class="currency_symbol">৳</span>{{$item->subtotal}}</span>
                            </td>
                            <td>
                                <a href="{{ route('cart.remove', ['rowId' => $item->rowId]) }} class="tm-cart-removeproduct"><i class="ti ti-close"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!--// Shopping Cart Table -->

            <!-- Shopping Cart Content -->
            <div class="tm-cart-bottomarea">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="tm-buttongroup">
                            <a href="#" class="tm-button">Continue Shopping</a>
                            <a href="#" class="tm-button">Update Cart</a>
                        </div>
                        <form action="#" class="tm-cart-coupon">
                            <label for="coupon-field">Have a coupon code?</label>
                            <input type="text" id="coupon-field" placeholder="Enter coupon code"
                                required="required">
                            <button type="submit" class="tm-button">Submit</button>
                        </form>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="tm-cart-pricebox">
                            <h2>Cart Totals</h2>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr class="tm-cart-pricebox-subtotal">
                                            <td>Cart Subtotal</td>
                                            <td>$175.00</td>
                                        </tr>
                                        <tr class="tm-cart-pricebox-shipping">
                                            <td>(+) Shipping Charge</td>
                                            <td>$15.00</td>
                                        </tr>
                                        <tr class="tm-cart-pricebox-total">
                                            <td>Total</td>
                                            <td>$190.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{route('checkout')}}" class="tm-button">Proceed To Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Shopping Cart Content -->

        </div>
    </div>
    <!--// Shopping Cart Area -->
@endsection

