@php use App\Models\Category; @endphp
<div id="tm-home-area" class="tm-header tm-header-sticky">
    <div class="tm-header-toparea">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-4">

                </div>
                <div class="col-md-4 text-center tm-header-top-logo">
                    <a href="{{url('/')}}" class="tm-header-logo">
                        <img src="{{ asset('public/frontend/assets/images/logo.png') }}" alt="Woman's World">
                    </a>
                </div>
                <div class="col-md-4">
                    <ul class="tm-header-icons">
                        <li></li>
                        <li><a data-bs-toggle="offcanvas" href="#offcanvasCart" role="button"
                                aria-controls="offcanvasCart"><i class="ti ti-shopping-cart"></i></a></li>
                        <li><a href="{{ route('wishlist') }}"><i class="ti ti-heart"></i></a></li>
                        <li><a href="{{ route('login') }}"><i class="ti ti-user"></i></a></li>
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
                            <img src="{{ asset('public/frontend/assets/images/logo.png') }}" alt="Woman's World">
                        </a>
                    </div>

                    <nav class="tm-header-nav">
                        <!-- Assuming $categories is the result of the tree function -->
                        <?php $categories = Category::tree(); ?>

                        <ul>
                            <x-category-menu :categories="$categories" />
                        </ul>
                    </nav>
                    <div class="tm-header-sticky-icons d-none">
                        <ul class="tm-header-icons">
                            <li></li>
                            <li><a data-bs-toggle="offcanvas" href="#offcanvasCart" role="button"
                                    aria-controls="offcanvasCart"><i class="ti ti-shopping-cart"></i></a></li>
                            <li><a href="{{ route('wishlist') }}"><i class="ti ti-heart"></i></a></li>
                            <li><a href="{{ route('login') }}"><i class="ti ti-user"></i></a></li>
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
