<?php

use Illuminate\Support\Facades\Route;

Route::get('/landing', function () {
    return view('landing_page');
});
Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);