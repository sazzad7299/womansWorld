<!-- Footer -->
<div class="tm-footer">
    <!-- Instagram Photos -->
    <ul id="instafeed" class="tm-instaphotos"></ul>
    <!--// Instagram Photos -->

    <div class="tm-footer-toparea" data-bgimage="{{asset('public/frontend/assets/images/footer-bgimage.jpg')}}"
        data-white-overlay="9">
        <div class="container">
            <div class="widgets widgets-footer row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="single-widget widget-info d-flex justify-content-center">
                        <ul>
                            <li><a href="#"><i class="ti ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti ti-twitter-alt"></i></a></li>
                            <li><a href="#"><i class="ti ti-pinterest"></i></a></li>
                            <li><a href="#"><i class="ti ti-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-center">
                        <ul class="single-widget col-md-6 menu d-flex justify-content-around">
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a href="{{route('shop')}}">Shipping</a></li>
                            <li><a href="{{route('blog')}}">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tm-footer-bottomarea">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <p class="tm-footer-copyright">Powered By <a href="https://aitsofts.com">Ait-softs</a> ©
                        2023</p>
                </div>
                <div class="col-md-5">
                    <div class="tm-footer-payment">
                        <img src="{{ asset('public/frontend/assets/images/payment-methods.png')}}" alt="payment methods">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--// Footer -->
