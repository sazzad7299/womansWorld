<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;

Route::get('/', [HomeController::class,'index']);
Route::get('service', function () {
    return view('frontend.pages.service');
})->name('service');
Route::get('blog', function () {
    return view('frontend.pages.blog');
})->name('blog');
Route::get('contact', function () {
    return view('frontend.pages.contact');
})->name('contact');
Route::get('cart', function () {
    return view('frontend.pages.cart');
})->name('cart');
Route::get('add-to-cart/{id}',[CartController::class,'buy'])->name('addToCart');
Route::get('wishlist', function () {
    return view('frontend.pages.wishlist');
})->name('wishlist');
Route::get('checkout', function () {
    return view('frontend.pages.checkout');
})->name('checkout');
Route::get('my-account', function () {
    return view('frontend.pages.my-account');
})->name('my-account');

Route::get('shop', function () {
    $products = Product::all();
    return view('frontend.pages.shop',compact('products'));
})->name('shop');
Route::get('product-details', function () {
    $products = Product::all();
    return view('frontend.pages.product-details',compact('products'));
})->name('product-details');
Route::get('my-account', [DashboardController::class, 'index'])->name('dashboard');


Route::group(['middleware' => 'auth'], function () {

    Route::view('profile', 'backend.profile')->name('profile');
    Route::post('photo-update', [ProfileController::class, 'photo'])->name('profile.photo');
    Route::post('password-update', [ProfileController::class, 'password'])->name('profile.password');
    Route::post('info-update', [ProfileController::class, 'info'])->name('profile.info');
    Route::get('/my-account',[DashboardController::class, 'userdashboard'])->name('user.dashboard');
});
Route::get('cart/remove/{rowId}',[CartController::class,'delete'])->name('cart.remove');
require __DIR__.'/auth.php';
Route::get('/product/{slug}', [ProductController::class,'product']);
