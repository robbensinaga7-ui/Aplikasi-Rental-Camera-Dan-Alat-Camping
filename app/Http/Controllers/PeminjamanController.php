<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
        return view('peminjaman', compact('peminjaman'));
    }

    public function show($id)
    {
        $data = Peminjaman::findOrFail($id);
        return view('detail_peminjaman', compact('data'));
    }

    public function kembalikan($id)
    {
        $data = Peminjaman::findOrFail($id);
        $data->status = 'selesai';
        $data->save();

        return redirect('/peminjaman')->with('success', 'Barang berhasil dikembalikan');
    }
}
