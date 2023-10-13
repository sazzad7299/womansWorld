<?php

use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('service', function () {
    return view('frontend.pages.service');
})->name('service');

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
