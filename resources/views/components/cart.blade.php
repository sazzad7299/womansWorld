<!-- Offcanvas Cart item  Start-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
    <div class="offcanvas-header">

        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <h5 class="offcanvas-title" id="offcanvasCartLabel">Cart</h5>
    </div>
    <div class="offcanvas-body">
        @foreach(Cart::content() as $item)
        <div class="cart-item">
            <div class="cart-item__image"><img
                    src="{{ asset($item->options->image) }}" alt="Product image">
            </div>
            {{-- <h1>@php print_r($item)  @endphp</h1> --}}
            <div class="cart-item__info"><a href="/product-detail.html">{{$item->name}}</a>
                <h5><span class="currency_symbol">৳</span>{{$item->price}}</h5>
                <p>Quantity:<span> {{$item->qty}}</span></p>
            </div><a href="{{ route('cart.remove', ['rowId' => $item->rowId]) }}" class="cart-item__remove" href="#"><i class="ti ti-close"></i></a>
        </div>
        @endforeach
        <div class="cart-items__total__price">
            <h5>Total</h5><span>{{ Cart::total() }}</span>
        </div>
        <div class="mt-3 d-flex justify-content-around">
            <a href="{{ route('cart') }}" class="tm-button">View Cart</a>
            <a href="{{ route('checkout') }}" class="tm-btn-reverse">Checkout</a>
        </div>
    </div>
</div>
<!-- Offcanvas Cart item  End-->
