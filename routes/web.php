<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\PelangganProductController;

/*
|--------------------------------------------------------------------------
| PAGES (STATIC)
|--------------------------------------------------------------------------
*/
Route::prefix('pages')->group(function () {
    Route::view('/home', 'pages.home');
    Route::view('/about', 'pages.about');
    Route::get('/product', function () {
    $products = \App\Models\Product::with('category')->get();
    return view('pages.product', compact('products'));
    });
});
Route::get('/', function () {
    return view('welcome');
});
/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot.password');

Route::post('/forgot-password', [App\Http\Controllers\AuthController::class, 'resetPassword'])
    ->name('reset.password');
Route::get('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| PRODUCT & CATEGORY
|--------------------------------------------------------------------------
*/
Route::resource('product', ProductController::class);
Route::resource('category', CategoryController::class);
/*
|--------------------------------------------------------------------------
| TRANSAKSI (FIX ERROR DI SINI)
|--------------------------------------------------------------------------
*/
Route::post('/admin/acc/{id}',  [TransactionController::class, 'acc']);
Route::post('/admin/tolak/{id}', [TransactionController::class, 'tolak']);
Route::resource('transaksi', TransactionController::class);
Route::post('/ajukan-kembali/{id}', [TransactionController::class, 'ajukanKembali']);
Route::post('/admin/konfirmasi-kembali/{id}', [TransactionController::class, 'konfirmasiKembali']);
Route::post('/kembalikan/{id}', [TransactionController::class, 'kembalikan']);
/*
|--------------------------------------------------------------------------
| PENGEMBALIAN
|--------------------------------------------------------------------------
*/
Route::get('/pengembalian', [ReturnController::class, 'index']);
Route::get('/pengembalian/create', [ReturnController::class, 'create']);
Route::post('/pengembalian', [ReturnController::class, 'store']);

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/transaksi', [TransactionController::class, 'index']);
Route::get('/admin/product', function () {
    $products = \App\Models\Product::all();
    return view('admin.product', compact('products'));
});
Route::get('/admin/pelanggan', [AdminController::class,'pelanggan']);

Route::get('/admin/pelanggan/create', [AdminController::class,'createPelanggan']);

Route::post('/admin/pelanggan/store', [AdminController::class,'storePelanggan']);

Route::get('/admin/pelanggan/edit/{id}', [AdminController::class,'editPelanggan']);

Route::post('/admin/pelanggan/update/{id}', [AdminController::class,'updatePelanggan']);

Route::get('/admin/pelanggan/delete/{id}', [AdminController::class,'deletePelanggan']);
Route::get('/admin/pembayaran', [TransactionController::class, 'adminPembayaran']);
Route::get('/admin/peminjaman', [TransactionController::class, 'peminjaman']);
Route::get('/admin/pengembalian', [TransactionController::class, 'pengembalian']);
/*
|--------------------------------------------------------------------------
| PELANGGAN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/pelanggan/dashboard', [PelangganController::class, 'index'])
        ->name('pelanggan.dashboard');
Route::post('/batalkan/{id}', [TransactionController::class, 'batalkan']);
    Route::get('/pelanggan/product', [PelangganProductController::class, 'index'])
        ->name('pelanggan.product');
        Route::get('/pelanggan/profile', function () {
    return view('pelanggan.profile');
});
Route::post('/pelanggan/profile/update', [PelangganController::class, 'updateProfile']);
    Route::post('/sewa', [SewaController::class, 'store'])
        ->name('sewa.store');
    Route::post('/transaksi/{id}/bayar', [TransactionController::class, 'bayar'])
        ->name('transaksi.bayar');
});
Route::post(
    '/transaksi/{id}/upload-dokumen',
    [TransactionController::class,'uploadDokumen']
)->name('transaksi.uploadDokumen');