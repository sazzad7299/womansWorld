<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\ProductController;

Route::get('/', function () {
    $products = Product::take(4)->get();
    return view('welcome',compact('products'));
});
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
Route::get('wishlist', function () {
    return view('frontend.pages.wishlist');
})->name('wishlist');
Route::get('checkout', function () {
    return view('frontend.pages.checkout');
})->name('checkout');
Route::get('my-account', function () {
    return view('frontend.pages.my-account');
})->name('my-account');
Route::get('login-register', function () {
    return view('frontend.pages.login-register');
})->name('login-register');
Route::get('shop', function () {
    $products = Product::all();
    return view('frontend.pages.shop',compact('products'));
})->name('shop');
Route::get('product-details', function () {
    $products = Product::all();
    return view('frontend.pages.product-details',compact('products'));
})->name('product-details');
Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::view('profile', 'backend.profile')->name('profile');
    Route::post('photo-update', [ProfileController::class, 'photo'])->name('profile.photo');
    Route::post('password-update', [ProfileController::class, 'password'])->name('profile.password');
    Route::post('info-update', [ProfileController::class, 'info'])->name('profile.info');
    Route::get('/user/dashboard',[DashboardController::class, 'userdashboard'])->name('user.dashboard');
});

require __DIR__.'/auth.php';
Route::get('/product/{slug}', [ProductController::class,'product']);
