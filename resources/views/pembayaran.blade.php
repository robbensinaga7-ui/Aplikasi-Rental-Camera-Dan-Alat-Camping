@extends('app')

@section('content')
<div class="container mt-4">
    <h2>Data Pembayaran</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Penyewa</th>
                <th>Total</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembayaran as $p)
            <tr>
                <td>{{ $p->user->name }}</td>
                <td>{{ $p->total }}</td>
                <td>{{ $p->status }}</td>
                <td>{{ $p->tanggal }}</td>
                <td>
                    <a href="/admin/pembayaran/konfirmasi/{{ $p->id }}" class="btn btn-success btn-sm">Konfirmasi</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection