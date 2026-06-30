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
/* DECORATION */
.dashboard-wrapper{
    position:relative;
}

.dashboard-wrapper::before{
    content:'';
    position:fixed;
    width:350px;
    height:350px;
    border-radius:50%;
    background:rgba(52,152,219,.08);
    top:-100px;
    right:-100px;
    z-index:-1;
}

.dashboard-wrapper::after{
    content:'';
    position:fixed;
    width:250px;
    height:250px;
    border-radius:50%;
    background:rgba(108,92,231,.08);
    bottom:-80px;
    left:-80px;
    z-index:-1;
}

/* HERO */
.hero-dashboard{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    color:white;
    padding:30px;
    border-radius:25px;
    margin-bottom:25px;
    box-shadow:0 15px 35px rgba(0,0,0,.12);
    position:relative;
    overflow:hidden;
}

.hero-dashboard::before{
    content:'';
    position:absolute;
    width:220px;
    height:220px;
    border-radius:50%;
    background:rgba(255,255,255,.15);
    top:-70px;
    right:-70px;
}

.hero-dashboard h1{
    font-size:36px;
    margin-bottom:10px;
}

/* STATS */
.stats{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
    margin-bottom:25px;
}

.stats{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
    margin-bottom:30px;
}

.stat-card{
    background:white;
    padding:30px;
    border-radius:25px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:.3s;
}

.stat-card:hover{
    transform:translateY(-8px);
}

.stat-card h3{
    font-size:40px;
    margin-bottom:8px;
    color:#2563eb;
}

.stat-card p{
    color:#64748b;
    font-weight:600;
}

/* TABLE HEADER */
th{
    background:linear-gradient(135deg,#3498db,#6c5ce7);
}

/* TABLE CARD */
.table-card{
    border-radius:25px;
}

/* TABLE ROW */
tbody tr:hover{
    background:#eef6ff;
}

/* TOTAL */
.total-price{
    color:#3498db;
    font-weight:700;
}

/* STATUS */
.badge{
    box-shadow:0 4px 10px rgba(0,0,0,.08);
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
.btn-batal{
    margin-top:8px;
    border:none;
    padding:8px 14px;
    border-radius:10px;
    background:linear-gradient(135deg,#e74c3c,#ff6b6b);
    color:white;
    cursor:pointer;
    transition:0.3s;
    font-size:12px;
}

.btn-batal:hover{
    transform:translateY(-2px);
    opacity:0.95;
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
/* ANIMATION */
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

@keyframes fadeLeft{
    from{
        opacity:0;
        transform:translateX(-40px);
    }
    to{
        opacity:1;
        transform:translateX(0);
    }
}

@keyframes pulse{
    0%{
        transform:scale(1);
    }
    50%{
        transform:scale(1.05);
    }
    100%{
        transform:scale(1);
    }
}

@keyframes float{
    0%{
        transform:translateY(0);
    }
    50%{
        transform:translateY(-10px);
    }
    100%{
        transform:translateY(0);
    }
}

/* HERO */
.hero-dashboard{
    animation:fadeLeft .8s ease;
}

/* STATS */
.stat-card{
    animation:fadeUp .8s ease;
}

.stat-card:nth-child(1){
    animation-delay:.1s;
}

.stat-card:nth-child(2){
    animation-delay:.2s;
}

.stat-card:nth-child(3){
    animation-delay:.3s;
}

/* ANGKA STATISTIK */
.stat-card h3{
    animation:pulse 2s infinite;
}

/* TITLE */
.section-title{
    animation:fadeLeft 1s ease;
}

/* TABLE */
.table-card{
    animation:fadeUp 1s ease;
}

/* BUTTON */
.btn-ajukan,
.btn-bayar,
.btn-batal{
    transition:.3s;
}

.btn-ajukan:hover,
.btn-bayar:hover,
.btn-batal:hover{
    transform:translateY(-3px) scale(1.05);
}

/* BADGE */
.badge{
    animation:float 3s infinite ease-in-out;
}

/* IMAGE */
.bukti-img{
    transition:.4s;
}

.bukti-img:hover{
    transform:scale(1.15) rotate(2deg);
}

/* HERO CIRCLE */
.hero-dashboard::before{
    animation:float 5s infinite ease-in-out;
}
</style>
@endsection

@section('content')

<div class="dashboard-wrapper">

<div class="hero-dashboard">
    <h2>👋 Halo, {{ $name }}</h2>
    <p>
        Selamat datang di sistem rental camping.
        Kelola peminjaman dan pantau status transaksi Anda dengan mudah.
    </p>
</div>

<div class="stats">

    <div class="stat-card">
        <h3>{{ $transactions->count() }}</h3>
        <p>Total Transaksi</p>
    </div>

    <div class="stat-card">
        <h3>{{ $transactions->where('status','dipinjam')->count() }}</h3>
        <p>Sedang Dipinjam</p>
    </div>

    <div class="stat-card">
        <h3>{{ $transactions->where('status','dikembalikan')->count() }}</h3>
        <p>Selesai</p>
    </div>

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

        <form action="/batalkan/{{ $t->id }}" method="POST">

            @csrf

            <button
                type="submit"
                class="btn-batal"
                onclick="return confirm('Yakin ingin membatalkan pesanan?')">
                ❌ Batalkan Pesanan
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

    @elseif($t->status == 'dibatalkan')

        <span class="badge badge-belum">
            Dibatalkan
        </span>

    @endif

</td>

   <!-- PAYMENT -->
<td>

    @if($t->payment_status == 'dibatalkan')

        <span class="badge badge-belum">
            Dibatalkan
        </span>

    @elseif(!$t->payment_status)

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

    @elseif($t->payment_status == 'dibatalkan')

    <span class="badge badge-belum">
        Dibatalkan
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