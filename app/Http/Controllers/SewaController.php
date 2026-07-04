<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class SewaController extends Controller
{
public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'qty' => 'required|integer|min:1',
        'rent_date' => 'required|date',
        'return_date' => 'required|date|after_or_equal:rent_date',
        'bukti' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'ktp' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $product = Product::findOrFail($request->product_id);

    if ($product->stock < $request->qty) {
        return back()->with('error', 'Stok tidak cukup!');
    }

    // 🔥 HITUNG HARI
    $hari = Carbon::parse($request->rent_date)
        ->diffInDays(Carbon::parse($request->return_date));
    $hari = $hari == 0 ? 1 : $hari;

    $totalPrice = $product->price * $request->qty * $hari;

    // 🔥 UPLOAD FILE
    $bukti = $request->file('bukti')->store('bukti_pembayaran', 'public');
    $ktp   = $request->file('ktp')->store('ktp', 'public');

    // 🔥 SIMPAN
    Transaction::create([
        'product_id' => $request->product_id,
        'user_id' => Auth::id(),
        'qty' => $request->qty,
        'rent_date' => $request->rent_date,
        'return_date' => $request->return_date,
        'price' => $totalPrice,
        'payment_proof' => $bukti,
        'ktp_image' => $ktp,
        'payment_status' => 'pending',
        'status' => 'dipinjam'
    ]);

    $product->decrement('stock', $request->qty);

    return back()->with('success', 'Berhasil sewa + upload!');
}
}