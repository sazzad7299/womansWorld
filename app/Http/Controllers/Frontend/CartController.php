<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function buy($product_id)
    {
        $size       = '';
        $color      = '';
        $qty        = 1;
        $product    = Product::findOrFail($product_id);

        Cart::add(['id' => $product_id, 'name' => $product->name, 'qty' => $qty, 'price' => $product->price, 'weight' => 1, 'options' => ['size' => $size, 'color' => $color, 'image' => $product->display]]);

        return redirect()->route('cart');
    }

    public function cart()
    {
        return view('frontend.pages.cart');
    }

    public function store(Request $request)
    {
        $product_id = $request->product_id;
        $size       = $request->size;
        $color      = $request->color;
        $qty        = $request->qty;

        $product    = Product::findOrFail($product_id);

        Cart::add(['id' => $product_id, 'name' => $product->name, 'qty' => $qty, 'price' => $product->price, 'weight' => 1, 'options' => ['size' => $size, 'color' => $color, 'image' => $product->display]]);

        echo Cart::count();
    }

    public function delete($rowId)
    {
        // $rowId = $request->row_id;
        Cart::remove($rowId);
        return back();
    }
}
