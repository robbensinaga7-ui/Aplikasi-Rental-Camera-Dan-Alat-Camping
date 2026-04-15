@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')
<div class="card">

    <h4 class="mb-3">Detail Peminjaman</h4>

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
            <th>Tanggal Kembali</th>
            <td>{{ $item['tgl_kembali'] }}</td>
        </tr>

        <tr>
            <th>Durasi</th>
            <td>{{ $item['durasi'] }}</td>
        </tr>

        <tr>
            <th>Harga / hari</th>
            <td>Rp {{ number_format($item['harga'],0,',','.') }}</td>
        </tr>

        <tr>
            <th>Total</th>
            <td>
                Rp {{ number_format($item['harga'] * (int) filter_var($item['durasi'], FILTER_SANITIZE_NUMBER_INT),0,',','.') }}
            </td>
        </tr>

        <tr>
            <th>Status</th>
            <td>
                @if($item['status'] == 'dipinjam')
                    <span class="badge bg-warning">Dipinjam</span>
                @elseif($item['status'] == 'terlambat')
                    <span class="badge bg-danger">Terlambat</span>
                @else
                    <span class="badge bg-success">Selesai</span>
                @endif
            </td>
        </tr>
    </table>

    <a href="/peminjaman" class="btn btn-secondary">Kembali</a>

</div>
@endsection