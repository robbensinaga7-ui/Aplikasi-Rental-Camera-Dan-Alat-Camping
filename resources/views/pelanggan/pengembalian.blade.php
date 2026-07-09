@extends('layouts.pelanggan')

@section('title','Pengembalian Barang')

@section('style')
<style>

/* HERO */
.hero-return{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    color:white;
    padding:25px 30px;
    border-radius:25px;
    margin-bottom:25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 15px 30px rgba(0,0,0,.12);
}

.hero-return h1{
    margin:0;
    font-size:30px;
}

.hero-count{
    background:rgba(255,255,255,.2);
    padding:15px 25px;
    border-radius:15px;
    font-size:20px;
    font-weight:bold;
}

/* CARD */
.return-card{
    background:white;
    border-radius:25px;
    padding:25px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

/* TABLE */
.table-box{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:linear-gradient(135deg,#0f172a,#334155);
    color:white;
    padding:14px;
    font-size:13px;
}

td{
    padding:14px;
    text-align:center;
    border-bottom:1px solid #eee;
}

tr:hover{
    background:#f5faff;
}

/* BADGE */
.badge{
    padding:6px 14px;
    border-radius:20px;
    font-size:11px;
    color:white;
    font-weight:600;
}

.badge-blue{ background:#3498db; }
.badge-orange{ background:#f39c12; }
.badge-green{ background:#2ecc71; }

/* BUTTON */
.btn{
    border:none;
    padding:8px 14px;
    border-radius:10px;
    font-size:12px;
    cursor:pointer;
    color:white;
}

.btn-ajukan{
    background:linear-gradient(135deg,#f39c12,#f7b731);
}

.btn-upload{
    margin-top:5px;
    padding:5px 10px;
    background:#e74c3c;
    border-radius:6px;
    font-size:11px;
    color:white;
}

/* EMPTY */
.empty{
    text-align:center;
    padding:30px;
    color:#94a3b8;
}

/* HERO */
.hero-return{
    opacity:0;
    transform:translateY(-30px);
    animation:fadeDown .8s ease forwards;
}

/* COUNT */
.hero-count{
    animation:pulse 2s infinite;
}

/* CARD */
.return-card{
    opacity:0;
    transform:translateY(30px);
    animation:fadeUp .8s ease forwards;
    animation-delay:.3s;
}

/* TABLE HEADER FIX */
th{
    position:sticky;
    top:0;
    z-index:1;
}

/* ROW ANIMATION */
tbody tr{
    opacity:0;
    transform:translateY(20px);
    animation:fadeUp .5s ease forwards;
}

/* DELAY PER BARIS */
tbody tr:nth-child(1){animation-delay:.1s;}
tbody tr:nth-child(2){animation-delay:.2s;}
tbody tr:nth-child(3){animation-delay:.3s;}
tbody tr:nth-child(4){animation-delay:.4s;}
tbody tr:nth-child(5){animation-delay:.5s;}
tbody tr:nth-child(6){animation-delay:.6s;}
tbody tr:nth-child(7){animation-delay:.7s;}
tbody tr:nth-child(8){animation-delay:.8s;}
tbody tr:nth-child(9){animation-delay:.9s;}
tbody tr:nth-child(10){animation-delay:1s;}

/* HOVER EFFECT */
tr:hover{
    background:#e0f7ff;
    transform:scale(1.01);
    box-shadow:0 5px 15px rgba(0,0,0,.05);
}

/* BUTTON HOVER */
.btn{
    transition:.3s;
}

.btn:hover{
    transform:translateY(-3px) scale(1.05);
}

/* BADGE ANIMATION */
.badge{
    transition:.3s;
}

.badge:hover{
    transform:scale(1.1);
}

/* KEYFRAMES */
@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(30px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

@keyframes fadeDown{
    from{
        opacity:0;
        transform:translateY(-30px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

@keyframes pulse{
    0%{ transform:scale(1); }
    50%{ transform:scale(1.05); }
    100%{ transform:scale(1); }
}
</style>
@endsection

@section('content')

<div class="hero-return">
    <div>
        <h1>📦 Pengembalian Barang</h1>
        <p>Ajukan pengembalian barang kamu di sini</p>
    </div>

    <div class="hero-count">
        {{ count($data) }} Data
    </div>
</div>

<div class="return-card">

<div class="table-box">
<table>

<thead>
<tr>
    <th>No</th>
    <th>Produk</th>
    <th>Tgl Pinjam</th>
    <th>Tgl Kembali</th>
    <th>Tgl Pengembalian Barang</th>
    <th>Denda</th>
    <th>Status</th>
    <th>Upload Barang Rusak</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>

@forelse($data as $i => $trx)
<tr>

<td>{{ $i+1 }}</td>

<td>{{ $trx->product->name }}</td>

<td>{{ \Carbon\Carbon::parse($trx->rent_date)->format('d M Y') }}</td>

<td>{{ \Carbon\Carbon::parse($trx->return_date)->format('d M Y') }}</td>

<td>
    {{ $trx->returned_at ?? '-' }}
</td>

<td>
    <div style="color:#f39c12;">Telat: Rp {{ number_format($trx->fine_late ?? 0,0,',','.') }}</div>
    <div style="color:#e67e22;">Rusak: Rp {{ number_format($trx->fine_damage ?? 0,0,',','.') }}</div>
    <div style="color:#e74c3c;">Hilang: Rp {{ number_format($trx->fine_lost ?? 0,0,',','.') }}</div>
</td>

<td>
    @if($trx->status == 'dipinjam')
        <span class="badge badge-blue">Dipinjam</span>
    @elseif($trx->status == 'diajukan')
        <span class="badge badge-orange">Menunggu</span>
    @else
        <span class="badge badge-green">Selesai</span>
    @endif
</td>

<td>
@if($trx->status == 'diajukan')
<form action="{{ route('transaksi.uploadRusak', $trx->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="foto_rusak">
    <br>
    <button class="btn-upload">Upload</button>
</form>
@else
-
@endif
</td>

<td>
@if($trx->status == 'dipinjam')
<form action="/ajukan-kembali/{{ $trx->id }}" method="POST">
    @csrf
    <button class="btn btn-ajukan">Ajukan Kembali</button>
</form>

@elseif($trx->status == 'diajukan')
    <span style="color:#f39c12;font-weight:bold;">Menunggu</span>

@else
    <span style="color:#2ecc71;font-weight:bold;">✔ Selesai</span>
@endif
</td>

</tr>

@empty
<tr>
<td colspan="9" class="empty">
    Tidak ada data pengembalian
</td>
</tr>
@endforelse

</tbody>

</table>
</div>

</div>

@endsection