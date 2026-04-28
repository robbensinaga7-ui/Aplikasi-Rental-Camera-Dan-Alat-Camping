<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReturnItem;
use App\Models\Transaction;
use Carbon\Carbon;
use App\Models\Product;      
class ReturnController extends Controller
{
    public function index()
    {
        $data = ReturnItem::with('transaction')->get();
        return view('pengembalian.index', compact('data'));
    }

    public function create()
    {
        $transactions = Transaction::where('status','dipinjam')->get();
        return view('pengembalian.create', compact('transactions'));
    }

    public function store(Request $request)
    {
        $trx = Transaction::find($request->transaction_id);
        if ($request->fine > 0) {
    $trx->update(['status' => 'terlambat']);
} else {
    $trx->update(['status' => 'kembali']);
}

    // hitung denda
    $today = Carbon::now();
    $returnDate = Carbon::parse($trx->return_date);

    $late = $today->diffInDays($returnDate, false);

    $fine = 0;

    if ($late < 0) {
        $fine = abs($late) * 10000; // 10rb/hari
    }

    // simpan pengembalian
    ReturnItem::create([
        'transaction_id' => $trx->id,
        'return_date' => $today,
        'fine' => $fine
    ]);

    // update status
    $trx->status = 'dikembalikan';
    $trx->save();

    // balikin stok
    $product = $trx->product;
    $product->stock += $trx->qty;
    $product->save();

    return redirect('/pengembalian')->with('success', 'Barang dikembalikan');
    }
}
