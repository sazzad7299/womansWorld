@extends('layouts.master')
@push('css')

@endpush
@section('frontend-content')
    <!-- Checkout Area -->
    <div class="tm-section tm-checkout-area bg-white tm-padding-section">
        <div class="container">
            <div class="tm-checkout-coupon">
                <a href="#checkout-couponform" data-toggle="collapse"><span>Have a coupon code?</span> Click
                    here and enter your code.</a>
                <div id="checkout-couponform" class="collapse">
                    <form action="#" class="tm-checkout-couponform">
                        <input type="text" id="coupon-field" placeholder="Enter coupon code"
                            required="required">
                        <button type="submit" class="tm-button">Submit</button>
                    </form>
                </div>
            </div>
            <form action="#" class="tm-form tm-checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="small-title">BILLING INFORMATION</h4>

                        <!-- Billing Form -->
                        <div class="tm-checkout-billingform">
                            <div class="tm-form-inner">
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <label for="billingform-firstname">First name*</label>
                                    <input type="text" id="billingform-firstname">
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <label for="billingform-lastname">Last name*</label>
                                    <input type="text" id="billingform-lastname">
                                </div>
                                <div class="tm-form-field">
                                    <label for="billingform-companyname">Company name</label>
                                    <input type="text" id="billingform-companyname">
                                </div>
                                <div class="tm-form-field">
                                    <label for="billingform-email">Email address</label>
                                    <input type="email" id="billingform-email">
                                </div>
                                <div class="tm-form-field">
                                    <label for="billingform-phone">Phone (Optional)</label>
                                    <input type="text" id="billingform-phone">
                                </div>
                                <div class="tm-form-field">
                                    <label for="billingform-country">Country</label>
                                    <select name="billingform-country" id="billingform-country">
                                        <option value="bangladesh">United States</option>
                                        <option value="bangladesh">Mexico</option>
                                        <option value="bangladesh">Australia</option>
                                        <option value="bangladesh">Germany</option>
                                        <option value="bangladesh">Sweden</option>
                                        <option value="bangladesh">France</option>
                                    </select>
                                </div>
                                <div class="tm-form-field">
                                    <label for="billingform-address">Address</label>
                                    <input type="text" id="billingform-address"
                                        placeholder="Apartment, Street Address">
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <label for="billingform-streetaddress">State</label>
                                    <input type="text" id="billingform-streetaddress">
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <label for="billingform-zipcode">Zip / Postcode</label>
                                    <input type="text" id="billingform-zipcode">
                                </div>
                                <div class="tm-form-field">
                                    <input type="checkbox" name="billform-dirrentswitch"
                                        id="billform-dirrentswitch">
                                    <label for="billform-dirrentswitch"><b>Ship to another address</b></label>
                                </div>
                            </div>
                        </div>
                        <!--// Billing Form -->

                        <!-- Different Address Form -->
                        <div class="tm-checkout-differentform">
                            <div class="tm-form-inner">
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <label for="differentform-firstname">First name*</label>
                                    <input type="text" id="differentform-firstname">
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <label for="differentform-lastname">Last name*</label>
                                    <input type="text" id="differentform-lastname">
                                </div>
                                <div class="tm-form-field">
                                    <label for="differentform-companyname">Company name</label>
                                    <input type="text" id="differentform-companyname">
                                </div>
                                <div class="tm-form-field">
                                    <label for="differentform-email">Email address</label>
                                    <input type="email" id="differentform-email">
                                </div>
                                <div class="tm-form-field">
                                    <label for="differentform-phone">Phone (Optional)</label>
                                    <input type="text" id="differentform-phone">
                                </div>
                                <div class="tm-form-field">
                                    <label for="differentform-country">Country</label>
                                    <select name="differentform-country" id="differentform-country">
                                        <option value="bangladesh">United States</option>
                                        <option value="bangladesh">Mexico</option>
                                        <option value="bangladesh">Australia</option>
                                        <option value="bangladesh">Germany</option>
                                        <option value="bangladesh">Sweden</option>
                                        <option value="bangladesh">France</option>
                                    </select>
                                </div>
                                <div class="tm-form-field">
                                    <label for="differentform-address">Address</label>
                                    <input type="text" id="differentform-address"
                                        placeholder="Apartment, Street Address">
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <label for="differentform-streetaddress">State</label>
                                    <input type="text" id="differentform-streetaddress">
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <label for="differentform-zipcode">Zip / Postcode</label>
                                    <input type="text" id="differentform-zipcode">
                                </div>
                            </div>
                        </div>
                        <!--// Different Address Form -->

                    </div>
                    <div class="col-lg-6">
                        <div class="tm-checkout-orderinfo">
                            <div class="table-responsive">
                                <table class="table table-borderless tm-checkout-ordertable">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Cosmetic plastic compact powder * 1</td>
                                            <td>$75.00</td>
                                        </tr>
                                        <tr>
                                            <td>Cosmetics and makeup brushes * 1</td>
                                            <td>$70.50</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="tm-checkout-subtotal">
                                            <td>Cart Subtotal</td>
                                            <td>$175.00</td>
                                        </tr>
                                        <tr class="tm-checkout-shipping">
                                            <td>(+) Shipping Charge</td>
                                            <td>$15.00</td>
                                        </tr>
                                        <tr class="tm-checkout-total">
                                            <td>Total</td>
                                            <td>$190.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="tm-checkout-payment">
                                <h4>Select Payment Method</h4>
                                <div class="tm-form-inner">
                                    <div class="tm-form-field">
                                        <input type="radio" name="checkout-payment-method"
                                            id="checkout-payment-cashondelivery"  checked="checked">
                                        <label for="checkout-payment-cashondelivery">Cash On Delivery</label>
                                        <div class="tm-checkout-payment-content">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tm-checkout-submit">
                                <p>Your personal data will be used to process your order, support your
                                    experience throughout this website, and for other purposes described in our
                                    privacy policy.</p>
                                <div class="tm-form-inner">
                                    <div class="tm-form-field">
                                        <input type="checkbox" name="checkout-read-terms"
                                            id="checkout-read-terms">
                                        <label for="checkout-read-terms">I have read and agree to the website
                                            terms and conditions</label>
                                    </div>
                                    <div class="tm-form-field">
                                        <button type="submit" class="tm-button ml-auto">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--// Checkout Area --
@endsection
@push('js')
<script src="{{asset('frontend/assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
@endpush
