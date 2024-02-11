<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->take(3)->get();
        $categories = Category::with('children')->where('type',1)->whereNull('parent_id')->get();
        $indentedCategories = Category::getIndentedCategories($categories);
        $products = Product::latest()->take(4)->get();
        return view('welcome', compact('sliders', 'products','indentedCategories'));
    }
}
