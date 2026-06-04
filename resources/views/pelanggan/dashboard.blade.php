@extends('layouts.pelanggan')

@section('title','Dashboard Pelanggan')

@section('style')
<style>

/* PAGE TITLE */
.page-title{
    font-size:30px;
    font-weight:700;
    color:#1e293b;
    margin-bottom:10px;
}

/* CARD */
.welcome-card{
    background:linear-gradient(135deg,#ffffff,#f9fbfd);
    padding:25px;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
    margin-bottom:25px;
}

.welcome-card h3{
    color:#2c3e50;
    margin-bottom:8px;
}

.welcome-card p{
    color:#64748b;
}

/* SECTION TITLE */
.section-title{
    margin-bottom:15px;
    color:#1e293b;
}

/* TABLE CARD */
.table-card{
    background:white;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
    overflow:hidden;
}

/* TABLE */
.table-box{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
}

/* HEADER */
th{
    background:linear-gradient(135deg,#1e293b,#334155);
    color:white;
    padding:14px;
    font-size:14px;
    white-space:nowrap;
}

/* BODY */
td{
    padding:14px;
    text-align:center;
    border-bottom:1px solid #eee;
    vertical-align:middle;
}

tr{
    transition:0.3s;
}

tr:hover{
    background:#f8fbff;
}

/* BADGE */
.badge{
    padding:6px 14px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
    display:inline-block;
}

.badge-belum{
    background:#fdecea;
    color:#e74c3c;
}

.badge-pending{
    background:#fff4e5;
    color:#f39c12;
}

.badge-lunas{
    background:#e8f8f0;
    color:#27ae60;
}

/* BUTTON */
.btn-ajukan{
    margin-top:8px;
    border:none;
    padding:8px 14px;
    border-radius:10px;
    background:linear-gradient(135deg,#3498db,#6c9cff);
    color:white;
    cursor:pointer;
    transition:0.3s;
    font-size:12px;
}

.btn-bayar{
    margin-top:8px;
    border:none;
    padding:8px 14px;
    border-radius:10px;
    background:linear-gradient(135deg,#f39c12,#f7b731);
    color:white;
    cursor:pointer;
    transition:0.3s;
    font-size:12px;
}

.btn-ajukan:hover,
.btn-bayar:hover{
    transform:translateY(-2px);
    opacity:0.95;
}

/* IMAGE */
.bukti-img{
    width:80px;
    height:80px;
    object-fit:cover;
    border-radius:12px;
    transition:0.3s;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

.bukti-img:hover{
    transform:scale(1.08);
}

/* FILE */
input[type=file]{
    width:100%;
    font-size:12px;
    margin-top:5px;
}

/* RESPONSIVE */
@media(max-width:768px){

.page-title{
    font-size:24px;
}

th,
td{
    font-size:12px;
    padding:10px;
}

.bukti-img{
    width:65px;
    height:65px;
}

}

</style>
@endsection

@section('content')

<h1 class="page-title">
    Dashboard Pelanggan
</h1>

<!-- WELCOME -->
<div class="welcome-card">

    <h3>
        👋 Halo, {{ $name }}
    </h3>

    <p>
        Silakan pilih menu Produk untuk mulai menyewa alat camping.
    </p>

</div>

<!-- TITLE -->
<h2 class="section-title">
    📜 Riwayat Peminjaman
</h2>

<!-- TABLE -->
<div class="table-card">

<div class="table-box">

<table>

<tr>
    <th>Produk</th>
    <th>Qty</th>
    <th>Sewa</th>
    <th>Kembali</th>
    <th>Total</th>
    <th>Status</th>
    <th>Status Bayar</th>
    <th>Bukti</th>
</tr>

@foreach($transactions as $t)

<tr>

    <td>
        {{ $t->product->name ?? '-' }}
    </td>

    <td>
        {{ $t->qty }}
    </td>

    <td>
        {{ $t->rent_date }}
    </td>

    <td>
        {{ $t->return_date }}
    </td>

    <td>
        Rp {{ number_format($t->price + $t->fine,0,',','.') }}
    </td>

    <!-- STATUS -->
    <td>

        @if($t->status == 'dipinjam')

            <span class="badge badge-pending">
                Dipinjam
            </span>

            <form action="/ajukan-kembali/{{ $t->id }}" method="POST">

                @csrf

                <button class="btn-ajukan">
                    Ajukan Pengembalian
                </button>

            </form>

        @elseif($t->status == 'menunggu_konfirmasi')

            <span class="badge badge-pending">
                Menunggu
            </span>

        @elseif($t->status == 'dikembalikan')

            <span class="badge badge-lunas">
                Dikembalikan
            </span>

        @elseif($t->status == 'ditolak')

            <span class="badge badge-belum">
                Ditolak
            </span>

        @endif

    </td>

    <!-- PAYMENT -->
    <td>

        @if(!$t->payment_status)

            <span class="badge badge-belum">
                Belum
            </span>

        @elseif($t->payment_status == 'pending')

            <span class="badge badge-pending">
                Menunggu
            </span>

        @elseif($t->payment_status == 'approved')

            <span class="badge badge-lunas">
                Lunas
            </span>

        @elseif($t->payment_status == 'rejected')

            <span class="badge badge-belum">
                Ditolak
            </span>

        @endif

    </td>

    <!-- BUKTI -->
    <td>

        @if($t->payment_proof)

            <img
            src="{{ asset('storage/'.$t->payment_proof) }}"
            class="bukti-img">

        @endif

        @if(!$t->payment_proof && $t->status != 'dikembalikan')

            <form
            action="{{ route('transaksi.bayar', $t->id) }}"
            method="POST"
            enctype="multipart/form-data">

                @csrf

                <input type="file" name="bukti" required>

                <button type="submit" class="btn-bayar">
                    Upload
                </button>

            </form>

        @elseif($t->payment_status == 'rejected')

            <form
            action="{{ route('transaksi.bayar', $t->id) }}"
            method="POST"
            enctype="multipart/form-data">

                @csrf

                <input type="file" name="bukti" required>

                <button type="submit" class="btn-bayar">
                    Upload Ulang
                </button>

            </form>

        @endif

    </td>

</tr>

@endforeach

</table>

</div>

</div>

@endsection