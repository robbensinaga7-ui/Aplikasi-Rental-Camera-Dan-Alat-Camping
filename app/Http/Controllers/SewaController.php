<?php

namespace App\Http\Controllers;
use App\Models\Transactions;
use App\Models\Product;
use Illuminate\Http\Request;

class SewaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'qty' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        // kurangi stock
        $product->stock -= $request->qty;
        $product->save();

        // simpan transaksi
        Transactions::create([
            'product_id' => $request->product_id,
            'customer_name' => $request->customer_name,
            'qty' => $request->qty,
            'rent_date' => $request->rent_date,
            'return_date' => $request->return_date,
            'status' => 'dipinjam'
        ]);

        return back()->with('success', 'Berhasil sewa produk!');
    }
}
