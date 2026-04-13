<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/home', function () {
    return view('home');
});

Route::get('/app', function(){
    return view('app');
});
<<<<<<< HEAD
Route::get('/register', function(){
    return view('register');
});
Route::get('login', function(){
    return view('login');
});
=======
>>>>>>> c45c20a9f2795052269331f2c7fc6acd250700fb

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