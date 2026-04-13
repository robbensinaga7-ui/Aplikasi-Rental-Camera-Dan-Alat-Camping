<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
Route::get('/home', function () {
    return view('home');
});


Route::get('/app', function(){
    return view('app');
});
Route::get('/admin', function () {
    return view('dashboard');
});
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/about', function () {
    return view('about');
});
Route::resource('/product', ProductController::class);
Route::resource('/category', CategoryController::class);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/store', [ProductController::class, 'store']);