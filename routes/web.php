<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ServiceController;

Route::get('/', [HomeController::class,'index']);
Route::get('service/{service}', [ServiceController::class,'getServices'])->name('service');
Route::get('news/{service}', [ServiceController::class,'getServices'])->name('blog');
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

Route::get('shop',[ProductController::class,'shop'])->name('shop');
Route::get('category/{category}',[ProductController::class,'shop'])->name('shop.category');
Route::get('my-account', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/product/{slug}', [ProductController::class, 'product'])->name('product-details');
Route::group(['middleware' => 'auth'], function () {

    Route::view('profile', 'backend.profile')->name('profile');
    Route::post('photo-update', [ProfileController::class, 'photo'])->name('profile.photo');
    Route::post('password-update', [ProfileController::class, 'password'])->name('profile.password');
    Route::post('info-update', [ProfileController::class, 'info'])->name('profile.info');
    Route::get('/my-account',[DashboardController::class, 'userdashboard'])->name('user.dashboard');
});
Route::get('cart/remove/{rowId}',[CartController::class,'delete'])->name('cart.remove');
require __DIR__.'/auth.php';
// Route::get('/product/{slug}', [ProductController::class,'product']);
