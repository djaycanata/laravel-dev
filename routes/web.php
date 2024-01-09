<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Product;
use App\Http\Controllers\ShopController;

Route::get('/', function () {
    $users = User::all();
    return view('welcome', compact('users'));
});

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/products', [ProductController::class,'index'])->name('products.index');
Route::get('/products/create', [ProductController::class,'create'])->name('products.create');
Route::post('/products', [ProductController::class,'store'])->name('products.store');

Route::get('shops/{userID}', [ShopController::class, 'index'])->name('shop.index');
Route::post('shops/{userID}', [ShopController::class, 'purchase'])->name('shop.purchase');
// Route::post('/shops/purchase', [ShopController::class, 'purchase'])->name('shop.purchase');
