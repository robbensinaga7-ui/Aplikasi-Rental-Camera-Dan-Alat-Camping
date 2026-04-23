@extends('layouts.app') 


@section('title', 'Transaksi Pembayaran') 


@section('content')
<div class="card">
    <h4 class="mb-3">Data Transaksi Pembayaran</h4>
    

    <table class="table table-bordered text-center">
      

        <thead style="background-color:#a8c3b8;">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Barang</th>
                <th>Total</th>
                <th>Metode</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($transaksi as $i => $item)
           

            <tr>
                <td>{{ $i+1 }}</td>
                

                <td>{{ $item->nama }}</td>
               

                <td>{{ $item->barang }}</td>
                
                <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                

                <td>{{ $item->metode }}</td>
                

                <td>
                    @if($item->status == 'belum_bayar')
                        <span class="badge bg-danger">Belum Bayar</span>
                        
                    @else
                        <span class="badge bg-success">Lunas</span>
                       
                    @endif
                </td>

                <td>
                    @if($item->status == 'belum_bayar')
                        <a href="#" class="btn btn-sm btn-warning">Bayar</a>
                        // Tombol aksi untuk melakukan pembayaran
                    @else
                        <span class="text-success">✔</span>
                       
                    @endif
                </td>
            </tr>
            @endforeach
          
        </tbody>
    </table>
</div>
@endsection