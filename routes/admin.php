<?php

use App\Http\Controllers\CouponController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\PayOptionController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\HelperController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductRequestController;
use App\Http\Controllers\ShippingOptionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\StockManagement;
use App\Http\Controllers\WebInfoController;

Route::group(['prefix' => '/admin', 'as' => 'admin.', 'middleware' => ['admin', 'auth']], function () {

    Route::get('dashboard', [DashboardController::class, 'admin'])->name('dashboard');
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::put('contacts/update/{contact}', [ContactController::class, 'update'])->name('contacts.update');
    Route::get('orders/{id}/delivery-status/{status}', [OrderController::class, 'status'])->name('orders.status');
    Route::get('orders/{id}/payment-status/{status}', [OrderController::class, 'paystatus'])->name('orders.paystatus');
    Route::post('orders/send-invoice',[OrderController::class, 'sendinvoice'])->name('order.invoiceSend');

    Route::post('get-subcategories', [HelperController::class, 'subCategory'])->name('get.subcategories');
    Route::post('get-childcategories', [HelperController::class, 'childCategory'])->name('get.childcategories');

    Route::resource('admins', AdminController::class)->except(['show']);
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('requestproduct', ProductRequestController::class);
    Route::resource('generals', GeneralController::class)->except(['create', 'edit', 'show']);
    Route::resource('sliders', SliderController::class)->except(['show']);
    Route::resource('pages', PageController::class)->except(['show']);
    Route::resource('faqs', FaqController::class)->except(['create', 'edit', 'show']);
    Route::resource('brands', BrandController::class)->except(['create', 'edit', 'show']);
    Route::resource('colors', ColorController::class)->except(['create', 'edit', 'show']);
    Route::resource('sizes', SizeController::class)->except(['create', 'edit', 'show']);
    Route::resource('categories', CategoryController::class)->except(['create', 'edit', 'show']);
    Route::resource('sub-categories', SubCategoryController::class)->except(['show']);
    Route::resource('child-categories', ChildCategoryController::class)->except(['show']);
    Route::get('product-stock',[StockManagement::class,'index'])->name('product.stock');

    //Sale Report
    Route::get('sale-report-search',[OrderController::class,'saleReportSearch'])->name('report.salesearch');

    Route::get('sale-report',[OrderController::class,'salereport'])->name('report.sale');


    //Website management
    Route::resource('payoptions',PayOptionController::class)->except('show');
    Route::resource('shippingoption',ShippingOptionController::class)->except('show');
    Route::resource('webinfo', WebInfoController::class)->except('show');

    //Marketing Part
    Route::resource('coupons',CouponController::class)->except(['show']);
    Route::get('admin/settings',[DashboardController::class,'settings'])->name('settings');

});
