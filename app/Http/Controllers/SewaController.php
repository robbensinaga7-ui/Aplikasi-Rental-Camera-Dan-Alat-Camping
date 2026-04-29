<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

        // cek stok cukup atau tidak
        if ($product->stock < $request->qty) {
            return back()->with('error', 'Stok tidak cukup!');
        }

        // kurangi stock
        $product->stock -= $request->qty;
        $product->save();

        // simpan transaksi
        Transaction::create([
            'product_id' => $request->product_id,
            'customer_name' => Auth::user()->name,
            'qty' => $request->qty,
            'rent_date' => $request->rent_date,
            'return_date' => $request->return_date,
            'status' => 'dipinjam'
        ]);

        return back()->with('success', 'Berhasil sewa produk!');
    }
}