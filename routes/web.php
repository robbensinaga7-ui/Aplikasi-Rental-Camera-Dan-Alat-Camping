<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReturnController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\PelangganProductController;
Route::get('/home', function () {
    return view('home');
});

Route::get('/app', function(){
    return view('app');
});
Route::prefix('pages')->group(function () {
    Route::view('/home', 'pages.home');
    Route::view('/register', 'pages.register');
    Route::view('/login', 'pages.login');
    Route::view('/product', 'pages.product');
    Route::view('/about', 'pages.about');
});

Route::get('/register', function(){
    return view('register');
});
Route::get('login', function(){
    return view('login');
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

Route::get('/admin', [TransactionController::class, 'adminDashboard']);
Route::get('/about', function () {
    return view('about');
});
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/pages/product', [ProductController::class, 'index']);

Route::get('/transaksi', [TransactionController::class, 'index']);
Route::get('/transaksi/create', [TransactionController::class, 'create']);
Route::post('/transaksi', [TransactionController::class, 'store']);
Route::get('/pengembalian', [ReturnController::class, 'index']);
Route::get('/pengembalian/create', [ReturnController::class, 'create']);
Route::post('/pengembalian', [ReturnController::class, 'store']);

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
Route::get('/admin/product', function () {
    $products = \App\Models\Product::all();
    return view('admin_product', compact('products'));
});

Route::get('/pelanggan/dashboard', [PelangganController::class, 'index'])
->name('pelanggan.dashboard');
Route::post('/sewa', [SewaController::class, 'store'])->name('sewa.store');
Route::get('/pelanggan/product', [PelangganProductController::class, 'index'])
->name('pelanggan.product');