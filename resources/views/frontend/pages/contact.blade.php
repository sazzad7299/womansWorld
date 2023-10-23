@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/service.css')}}">

@endpush
@section('frontend-content')
    <!-- Contact Us -->
    <div id="tm-contactus-area" class="tm-section tm-contact-area tm-padding-section bg-white"
    data-bgimage="{{asset('public/frontend/assets/images/contact-us-background.png')}}" data-white-overlay="8">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-9 col-12">
                <div class="tm-sectiontitle text-center">
                    <h2>Contact Us</h2>
                    <span class="tm-sectiontitle-divider">
                        <img src="{{asset('public/frontend/assets/images/section-divider-icon.png')}}" alt="section divider">
                    </span>
                    <p>Lorem ipsum dolor sittem ametamngcing elit, per sed do eiusmoad teimpor sittem elit
                        inuning ut sed sittem do eiusmod.</p>
                </div>
            </div>
        </div>

        <div class="tm-contact-top tm-scrollanim">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div class="tm-contact-address">
                        <h4>Signature Branch</h4>
                        <div class="tm-contact-addressblock">
                            <b>Address</b>
                            <p>Toronto City Hall 123 Queen St W, Toronto, Ontario M1N2O3, Canada.</p>
                        </div>
                        <div class="tm-contact-addressblock">
                            <b>Email</b>
                            <p>Email: <a href="mailto:info@example.com">info@example.com</a></p>
                            <p>Skype: example.name</p>
                        </div>
                        <div class="tm-contact-addressblock">
                            <b>Phone</b>
                            <p><a href="tel:+18009156270">1-800-915-6270</a></p>
                            <p><a href="tel:+18009156272">1-800-915-6272</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tm-contact-address">
                        <h4>Head office</h4>
                        <div class="tm-contact-addressblock">
                            <b>Address</b>
                            <p>Toronto City Hall 123 Queen St W, Toronto, Ontario M1N2O3, Canada.</p>
                        </div>
                        <div class="tm-contact-addressblock">
                            <b>Email</b>
                            <p>Email: <a href="mailto:info@example.com">info@example.com</a></p>
                            <p>Skype: example.name</p>
                        </div>
                        <div class="tm-contact-addressblock">
                            <b>Phone</b>
                            <p><a href="tel:+18009156270">1-800-915-6270</a></p>
                            <p><a href="tel:+18009156272">1-800-915-6272</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tm-contact-top tm-scrollanim">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div class="tm-contact-address">
                        <h4>Banani Branch</h4>
                        <div class="tm-contact-addressblock">
                            <b>Address</b>
                            <p>Toronto City Hall 123 Queen St W, Toronto, Ontario M1N2O3, Canada.</p>
                        </div>
                        <div class="tm-contact-addressblock">
                            <b>Email</b>
                            <p>Email: <a href="mailto:info@example.com">info@example.com</a></p>
                            <p>Skype: example.name</p>
                        </div>
                        <div class="tm-contact-addressblock">
                            <b>Phone</b>
                            <p><a href="tel:+18009156270">1-800-915-6270</a></p>
                            <p><a href="tel:+18009156272">1-800-915-6272</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tm-contact-address">
                        <h4>Dhanmondi Branch</h4>
                        <div class="tm-contact-addressblock">
                            <b>Address</b>
                            <p>Toronto City Hall 123 Queen St W, Toronto, Ontario M1N2O3, Canada.</p>
                        </div>
                        <div class="tm-contact-addressblock">
                            <b>Email</b>
                            <p>Email: <a href="mailto:info@example.com">info@example.com</a></p>
                            <p>Skype: example.name</p>
                        </div>
                        <div class="tm-contact-addressblock">
                            <b>Phone</b>
                            <p><a href="tel:+18009156270">1-800-915-6270</a></p>
                            <p><a href="tel:+18009156272">1-800-915-6272</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tm-contact-bottom tm-padding-section-top">
            <div class="row mt-50-reverse">
                <div class="col-lg-6">
                    <div class="tm-contact-formwrapper mt-50">
                        <h3>Send Your Message Us</h3>
                        <form id="tm-contactform" action="assets/php/mailer.php"
                            class="tm-contact-forminner tm-form" method="POST">
                            <div class="tm-form-inner">
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <input type="text" placeholder="Name (required)" name="name" required>
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <input type="email" placeholder="Email (required)" name="email"
                                        required>
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <input type="text" placeholder="Phone Number (required)" name="phone"
                                        required>
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <input type="text" placeholder="Subject" name="subject">
                                </div>
                                <div class="tm-form-field">
                                    <textarea cols="30" rows="5" placeholder="Message"
                                        name="message"></textarea>
                                </div>
                                <div class="tm-form-field">
                                    <button type="submit" class="tm-button tm-button-block">Send
                                        Now</button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messages"></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tm-contact-map mt-50">
                        <h3>Find our Location</h3>
                        <div id="google-map" class="google-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.761363820623!2d90.41183087475204!3d23.79151068719794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7a0db07e79d%3A0x417648c155313a26!2sWoman&#39;s%20World%20Signature%20Branch!5e0!3m2!1sen!2sbd!4v1697485300600!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--// Contact Us -->
@endsection
