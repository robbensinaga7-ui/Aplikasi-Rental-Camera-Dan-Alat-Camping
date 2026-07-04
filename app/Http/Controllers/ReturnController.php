<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReturnItem;
use App\Models\Transaction;
use Carbon\Carbon;      
class ReturnController extends Controller
{
    public function index()
{
    $data = Transaction::with('product')
    ->where('user_id', auth()->id())
    ->whereIn('status', ['dipinjam', 'menunggu_konfirmasi', 'dikembalikan'])
    ->get();
        foreach ($data as $item) {

    $today = now()->startOfDay();
    $return_date = \Carbon\Carbon::parse($item->return_date)->startOfDay();

    if ($today->gt($return_date)) {
        $item->late_days = $return_date->diffInDays($today);
        $item->fine_preview = $item->late_days * 10000;
    } else {
        $item->late_days = 0;
        $item->fine_preview = 0;
    }
}

    return view('pelanggan.pengembalian', compact('data'));
}

    public function create(int $id)
{
    $transaksi = Transaction::findOrFail($id);
    return view('pelanggan.pengembalian', compact('transaksi'));
}

   public function store(Request $request)
{
    $trx = Transaction::findOrFail($request->transaction_id);

    $today = Carbon::parse($request->returned_at);
    $returnDate = Carbon::parse($trx->return_date);

    $late = $today->diffInDays($returnDate, false);

    $fine_late = 0;

if ($late < 0) {
    $fine_late = abs($late) * 10000;
}

$trx->fine_late = $fine_late;
$trx->returned_at = $today;
$trx->status = 'menunggu_konfirmasi';
$trx->save();

    // upload foto jika ada
    $photoPath = null;
    if ($request->hasFile('damage_photo')) {
        $photoPath = $request->file('damage_photo')->store('returns', 'public');
    }

    // simpan
    ReturnItem::create([
        'transaction_id' => $trx->id,
        'return_date' => $today,
        'fine' => $fine_late,
        'condition' => $request->condition,
        'damage_photo' => $photoPath
    ]);

    // update status
    $trx->status = 'dikembalikan';
    $trx->save();

    // balikin stok
    $product = $trx->product;
    $product->stock += $trx->qty;
    $product->save();

    return redirect('/pelanggan/dashboard')->with('success', 'Pengembalian berhasil!');
}
}
