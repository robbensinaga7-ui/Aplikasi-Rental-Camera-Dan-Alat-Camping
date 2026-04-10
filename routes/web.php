<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
});
Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/app', function(){
    return view('app');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/product', function () {
    return view('product');
});