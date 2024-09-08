<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\product\ProductsController;
use App\Http\Controllers\product\ProductDetailsController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('verified')->group(function(){
    Route::get('/products', [ProductsController::class, 'index'])->name('product.products');
    Route::get('/product-details/{id}', [productDetailsController::class, 'show'])->name('product.product-details');
});

// Route::get('/dashboard', [dashboardController::class, 'index'])->name('admin.dashboard');
Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', function () {
        if (Auth::check() && Auth::user()->email === 'admin@gmail.com') {
            return view('admin.dashboard');
        } else {
            abort(403, 'Unauthorized access.');
        }
    })->name('admin.dashboard');
});

// Route::middleware(['auth', 'role:admin'])->group(function() {
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');
// });

Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
