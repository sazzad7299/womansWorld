<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\HomeController;
use App\Http\Controllers\Api\V1\BrandController;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\CouponController;
use App\Http\Controllers\Api\V1\ReviewController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\UserRegisterController;
use App\Http\Controllers\Api\V1\PasswordResetController;
use App\Http\Controllers\Api\V1\EmailVerificationController;
use App\Http\Controllers\Api\V1\ProductRequestController;
use App\Http\Controllers\Api\V1\ProfileController;
use App\Http\Controllers\Api\V1\WishlistController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'v1/auth'], function() {
    Route::post('/register', [UserRegisterController::class,'createUser']);
    Route::post('/login', [UserRegisterController::class,'loginuser']);
    // Route::post('social-login', 'App\Http\Controllers\Api\V2\AuthController@socialLogin');
    Route::post('password/forget_request', [PasswordResetController::class,'forgetRequest']);
    // Route::post('password/confirm_reset', 'App\Http\Controllers\Api\V2\PasswordResetController@confirmReset');
    // Route::post('password/resend_code', 'App\Http\Controllers\Api\V2\PasswordResetController@resendCode');
    // Route::middleware('auth:sanctum')->group(function () {
    //     Route::get('logout', 'App\Http\Controllers\Api\V2\AuthController@logout');
    //     Route::get('user', 'App\Http\Controllers\Api\V2\AuthController@user');
    // });
    // Route::post('resend_code', 'App\Http\Controllers\Api\V2\AuthController@resendCode');
    // Route::post('confirm_code', 'App\Http\Controllers\Api\V2\AuthController@confirmCode');
});

Route::group(['prefix'=>'v1'], function(){

    // Private Users
    Route::group(['middleware'=>['auth:sanctum']],function(){
        Route::get('/user-info', function (Request $request) {
            return $request->user();
        });
        Route::get('/user-shipping-info',[HomeController::class,'usershipping']);
        Route::post('/reviews/store', [ReviewController::class, 'store']);
        Route::post('photo-update', [ProfileController::class, 'photo'])->name('profile.photo');
        Route::post('password-update', [ProfileController::class, 'password'])->name('profile.password');
        Route::post('info-update', [ProfileController::class, 'info'])->name('profile.info');
        Route::post('shipping-info-update', [ProfileController::class, 'shippinginfo'])->name('profile.shippinginfo');
        // Route::get('my-orders', [HomeController::class, 'myorder']);
        Route::apiResource('orders',OrderController::class);
        Route::apiResource('wishlist',WishlistController::class);
        Route::post('product-request',[ProductRequestController::class, 'store']);
    });
    Route::group(['middleware'=>['auth:sanctum']],function(){
        Route::post('/logout', [UserRegisterController::class,'logout']);
        Route::get('/shippingoption',[HomeController::class,'shippingoptions']);
    });
    // Guest users
    Route::group(['middleware'=>['guest']],function(){
        Route::post('/register', [UserRegisterController::class,'createUser']);
        Route::post('/login', [UserRegisterController::class,'loginuser']);
    });

    //PUBLIC USERS
    Route::post('/checkcoupondiscount',[CouponController::class,'checkCouponDiscount']);
    Route::get('/verify-email/{id}/{hash}', [EmailVerificationController::class,'verifyemail']);
    //products

    // shop product
    Route::apiResource('products', ProductController::class)->except(['store', 'update', 'destroy']);

    //brand
    Route::get('/brands',[BrandController::class,'brands']);
    Route::get('product/brand/{slug}',[BrandController::class,'brand'])->name('product.brand');
    //brand/{}
    // product-category/{}
    Route::get('/categories',[CategoryController::class,'categories']);
    Route::get('product/category/{slug}',[CategoryController::class,'productbycategory'])->name('product.category');

    //Home product
    Route::get('home/products', [HomeController::class,'homeproducts']);
    Route::get('home/categories', [HomeController::class,'homecategories']);
    Route::get('home/offers', [HomeController::class,'homeoffers']);
    Route::get('home/newarrival', [HomeController::class,'homenewarrival']);
    Route::get('home/brands', [HomeController::class,'homebrands']);
    Route::get('home/sliders', [HomeController::class,'homeSlider']);
    Route::get('home/featured', [HomeController::class,'homefeatured']);
    Route::get('home/set', [HomeController::class,'homepset']);

    Route::get('payoptions', [HomeController::class,'payoption']);
    Route::get('webinfo', [HomeController::class, 'webinfo']);

    //search
    Route::get('product',[HomeController::class,'search']);
    //Page
    Route::get('/pages',[HomeController::class,'pages']);
    Route::get('/faqs',[HomeController::class,'faqs']);
    Route::get('/pages/{slug}',[HomeController::class,'pagedetails']);
});
