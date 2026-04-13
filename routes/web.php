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
Route::get('/register', function(){
    return view('register');
});
Route::get('/login', function(){
    return view('login');
});
Route::resource('/product', ProductController::class);
Route::resource('/category', CategoryController::class);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/store', [ProductController::class, 'store']);


Route::get('/about', function () {
    return view('about');
});

Route::get('/product', [ProductController::class, 'index']);

Route::get('/admin', function () {
    return view('dashboard');
});

Route::get('/pengembalian', function () {

    $pengembalian = [
        (object)[
            'nama' => 'John',
            'barang' => 'Kamera Canon',
            'tgl_pinjam' => '2026-04-10',
            'tgl_kembali' => '2026-04-12',
            'status' => 'dipinjam'
        ],
        (object)[
            'nama' => 'Budi',
            'barang' => 'Tenda Camping',
            'tgl_pinjam' => '2026-04-05',
            'tgl_kembali' => '2026-04-07',
            'status' => 'dikembalikan'
        ]
    ];

    return view('pengembalian', compact('pengembalian'));
});
