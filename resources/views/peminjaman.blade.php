@extends('layouts.app')

@section('title', 'Peminjaman')

@section('content')
<div class="card">
    <h4 class="mb-3">Data Peminjaman</h4>

    <table class="table table-bordered text-center">
        <thead style="background-color:#a8c3b8;">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Barang</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Durasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($peminjaman as $i => $item)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->barang }}</td>
                <td>{{ $item->tgl_pinjam }}</td>
                <td>{{ $item->tgl_kembali }}</td>
                <td>{{ $item->durasi }}</td>

                <td>
                    @if($item->status == 'dipinjam')
                        <span class="badge bg-warning">Dipinjam</span>
                    @elseif($item->status == 'terlambat')
                        <span class="badge bg-danger">Terlambat</span>
                    @else
                        <span class="badge bg-success">Selesai</span>
                    @endif
                </td>

                <td>
                   <a href="/peminjaman/{{ $i }}" class="btn btn-sm btn-primary">Detail</a>
                    <a href="/kembalikan/{{ $i }}" class="btn btn-sm btn-success">Kembalikan</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection