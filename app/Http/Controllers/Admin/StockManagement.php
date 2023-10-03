<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductsApiResource;

class StockManagement extends Controller
{
    public function index()
    {
        $products = ProductsApiResource::collection(Product::latest()->where('stock','<',20)->paginate(10));
        return view('backend.admin.products.stock',compact('products'));
    }
    public function stockalert()
    {
        $products = Product::latest()->select('id','name','stock')->paginate(10);
        return view('backend.admin.products.stock',compact('products'));
    }
}
