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
            'barang' => 'Kamera',
            'tgl_pinjam' => '2026-04-10',
            'tgl_kembali' => '2026-04-20',
            'status' => 'dipinjam'
        ]
    ];

    return view('pengembalian', compact('pengembalian'));
});

Route::get('/transaksi', function () {

    $transaksi = [
        (object)[
            'nama' => 'John',
            'barang' => 'Kamera Canon',
            'tgl_pinjam' => '2026-04-10',
            'tgl_kembali' => '2026-04-20',
            'total' => 500000,
            'metode' => 'Transfer',
            'status' => 'belum_bayar'
        ],
        (object)[
            'nama' => 'Budi',
            'barang' => 'Tenda Camping',
            'tgl_pinjam' => '2026-04-05',
            'tgl_kembali' => '2026-04-07',
            'total' => 200000,
            'metode' => 'Cash',
            'status' => 'lunas'
        ]
    ];

    return view('transaksi', compact('transaksi'));
});
Route::get('/peminjaman', function () {

    $peminjaman = [
        (object)[
            'nama' => 'John',
            'barang' => 'Kamera Canon',
            'tgl_pinjam' => '2026-04-10',
            'tgl_kembali' => '2026-04-20',
            'durasi' => '10 hari',
            'status' => 'dipinjam'
        ],
        (object)[
            'nama' => 'Budi',
            'barang' => 'Tenda Camping',
            'tgl_pinjam' => '2026-04-01',
            'tgl_kembali' => '2026-04-05',
            'durasi' => '4 hari',
            'status' => 'terlambat'
        ]
    ];

    return view('peminjaman', compact('peminjaman'));
});
Route::get('/peminjaman/{id}', function ($id) {

    $data = [
        [
            'nama' => 'John',
            'barang' => 'Kamera Canon',
            'tgl_pinjam' => '2026-04-10',
            'tgl_kembali' => '2026-04-20',
            'durasi' => '10 hari',
            'harga' => 50000,
            'status' => 'dipinjam'
        ],
        [
            'nama' => 'Budi',
            'barang' => 'Tenda Camping',
            'tgl_pinjam' => '2026-04-01',
            'tgl_kembali' => '2026-04-05',
            'durasi' => '4 hari',
            'harga' => 30000,
            'status' => 'terlambat'
        ]
    ];

    $item = $data[$id];

    return view('detail_peminjaman', compact('item'));
});

Route::get('/kembalikan/{id}', function ($id) {

    $data = [
        [
            'nama' => 'John',
            'barang' => 'Kamera Canon',
            'tgl_pinjam' => '2026-04-10',
            'tgl_kembali' => '2026-04-20',
            'harga' => 50000
        ],
        [
            'nama' => 'Roben',
            'barang' => 'Tenda Camping',
            'tgl_pinjam' => '2026-04-01',
            'tgl_kembali' => '2026-04-05',
            'harga' => 30000
        ]
    ];

    $item = $data[$id];

    return view('kembalikan', compact('item'));
});