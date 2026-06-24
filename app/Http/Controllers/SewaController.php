<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SewaController extends Controller
{
   

public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'qty' => 'required|integer|min:1',
        'rent_date' => 'required|date',
        'return_date' => 'required|date|after_or_equal:rent_date',
    ]);

    $product = Product::findOrFail($request->product_id);

    //  cek stok
    if ($product->stock < $request->qty) {
        return back()->with('error', 'Stok tidak cukup!');
    }


    

    //  HITUNG TOTAL
    $totalPrice = $product->price * $request->qty;

    //  SIMPAN TRANSAKSI
    Transaction::create([
        'product_id' => $request->product_id,
        'user_id' => Auth::id(),
        'qty' => $request->qty,
        'rent_date' => $request->rent_date,
        'return_date' => $request->return_date,
        'price' => $totalPrice,
        'fine' => 0,
        'status' => 'dipinjam'
    ]);

    // ✅ KURANGI STOK
    $product->stock -= $request->qty;
    $product->save();

    return back()->with('success', 'Berhasil sewa produk!');
}
}