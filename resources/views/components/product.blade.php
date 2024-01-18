<div class="col-lg-4 col-md-4 col-sm-4 col-12 mt-30">
    <div class="tm-product tm-scrollanim">
        <div class="tm-product-topside">
            <img src="{{ asset($product->display)}}"
                alt="product image">
            <ul class="tm-product-actions">
                <li><button data-fancybox data-src="#tm-product-quickview"><i
                            class="ti ti-eye"></i></button></li>
                <li><a href="#"><i class="ti ti-heart"></i></a></li>

            </ul>
            <ul class="tm-product-addToCart">
                <li><a href="{{route('cart')}}" class="widget-pricefilter-button">Add to Cart <i class="ti ti-shopping-cart"></i></a></li>
            </ul>
        </div>
        <div class="tm-product-bottomside text-center">
            <h6 class="tm-product-title"><a href="{{ route('product-details', ['slug' => $product->slug]) }}">
                {{ $product->name }}
            </a></h6>
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
