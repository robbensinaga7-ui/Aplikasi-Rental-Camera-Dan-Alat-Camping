<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReturnItem;
use App\Models\Transaction;
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
        ReturnItem::create($request->all());

        // update status jadi kembali
        $trx = Transaction::find($request->transaction_id);
        $trx->update(['status' => 'kembali']);

        return redirect('/pengembalian');
    }
}
