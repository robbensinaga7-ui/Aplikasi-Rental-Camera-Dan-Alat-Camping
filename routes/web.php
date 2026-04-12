<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
Route::get('/home', function () {
    return view('home');
});


Route::get('/app', function(){
    return view('app');
});
Route::get('/register', function(){
    return view('register');
})
Route::get('/about', function () {
    return view('about');
});
Route::get('/product', [ProductController::class, 'index']);

