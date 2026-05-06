<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $transaksiCount = Transaction::count();
        $totalBooking = Transaction::count();

        $totalPendapatan = Transaction::where('payment_status', 'approved')->sum('price');

        $pendingPembayaran = Transaction::where('payment_status', 'pending')->count();

        $latestTransaksi = Transaction::latest()->take(5)->get();

        
        $labels = ['Menunggu', 'Dikonfirmasi', 'Selesai', 'Dibatalkan'];

        $data = [
            Transaction::where('payment_status', 'pending')->count(),     
            Transaction::where('payment_status', 'approved')->count(),   
            Transaction::where('status', 'dikembalikan')->count(),       
            Transaction::where('payment_status', 'rejected')->count(),    
        ];

        return view('admin.dashboard', compact(
            'productCount',
            'transaksiCount',
            'totalBooking',
            'totalPendapatan',
            'pendingPembayaran',
            'latestTransaksi',
            'labels',
            'data'
        ));
    }
}