<!-- Offcanvas Cart item  Start-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart"
aria-labelledby="offcanvasCartLabel">
<div class="offcanvas-header">

    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
        aria-label="Close"></button>
    <h5 class="offcanvas-title" id="offcanvasCartLabel">Cart</h5>
</div>
<div class="offcanvas-body">
        <div class="cart-item">
            <div class="cart-item__image"><img src="{{ asset('frontend/assets/images/products/product-image-1-thumb.jpg')}}" alt="Product image"></div>
            <div class="cart-item__info"><a href="/product-detail.html">The expert mascaraa</a>
              <h5>$35.00</h5>
              <p>Quantity:<span> 1</span></p>
            </div><a class="cart-item__remove" href="#"><i class="ti ti-close"></i></a>
          </div>
          <div class="cart-items__total__price">
            <h5>Total</h5><span>$73.00</span>
          </div>
    <div class="mt-3 d-flex justify-content-around">
        <a href="#" class="tm-button">View Cart</a>
        <a href="#" class="tm-btn-reverse">Checkout</a>
    </div>
</div>
</div>
<!-- Offcanvas Cart item  End-->
