@extends('layouts.app')

@section('title', 'Pengembalian')

@section('content')
<div class="card">
    <h4>Data Pengembalian</h4>

    <table class="table table-bordered text-center">
        <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Barang</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($pengembalian as $i => $item)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->barang }}</td>
                <td>{{ $item->tgl_pinjam }}</td>
                <td>{{ $item->tgl_kembali }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection