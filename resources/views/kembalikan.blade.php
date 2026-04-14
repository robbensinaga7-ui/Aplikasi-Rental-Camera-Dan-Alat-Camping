@extends('layouts.app')

@section('title', 'Kembalikan Barang')

@section('content')
<div class="card">

    <h4 class="mb-3">Form Pengembalian</h4>

    <table class="table">
        <tr>
            <th>Nama</th>
            <td>{{ $item['nama'] }}</td>
        </tr>
        <tr>
            <th>Barang</th>
            <td>{{ $item['barang'] }}</td>
        </tr>
        <tr>
            <th>Tanggal Pinjam</th>
            <td>{{ $item['tgl_pinjam'] }}</td>
        </tr>
        <tr>
            <th>Batas Kembali</th>
            <td>{{ $item['tgl_kembali'] }}</td>
        </tr>
    </table>

    <form>
        <div class="mb-3">
            <label>Tanggal Dikembalikan</label>
            <input type="date" class="form-control" name="tgl_kembali_real">
        </div>

        <div class="mb-3">
            <label>Denda</label>
            <input type="text" class="form-control" value="Rp 0" readonly>
        </div>

        <button class="btn btn-success">Konfirmasi Kembalikan</button>
        <a href="/peminjaman" class="btn btn-secondary">Batal</a>
    </form>

</div>
@endsection