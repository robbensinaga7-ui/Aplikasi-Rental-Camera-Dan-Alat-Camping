<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Transactions;
use App\Models\Peminjaman;
use App\Models\ReturnItem;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'productCount' => Product::count(),
            'transaksiCount' => Transactions::count(),
            'peminjamanCount' => Peminjaman::count(),
            'pengembalianCount' => ReturnItem::count(),
            'latestTransaksi' => Transactions::latest()->take(5)->get(),
        ]);
    }
}
