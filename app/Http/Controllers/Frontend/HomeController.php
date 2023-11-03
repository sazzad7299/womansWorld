<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->take(3)->get();
        // dd($sliders);
        $products = Product::latest()->take(4)->get();
        return view('welcome', compact('sliders', 'products'));
    }
}
