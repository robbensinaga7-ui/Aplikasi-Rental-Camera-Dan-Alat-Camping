<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;


Route::get('/home', function () {
    return view('home');
});

Route::get('/app', function(){
    return view('app');
});

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::resource('/product', ProductController::class);
Route::resource('/category', CategoryController::class);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/store', [ProductController::class, 'store']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/admin', function () {
    if (!session('is_admin')) {
        return redirect('/login');
    }

    return view(' dashboard');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/product', [ProductController::class, 'index']);

Route::get('/pengembalian', function () {

    $pengembalian = [
        (object)[
            'nama' => 'John',
            'barang' => 'Kamera Canon',
            'tgl_pinjam' => '2026-04-10',
            'tgl_kembali' => '2026-04-20',
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
