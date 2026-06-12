@extends('layouts.admin')

@section('title','Data Transaksi')

@section('style')
<style>

/* HERO */
.hero-transaksi{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    color:white;
    padding:25px 30px;
    border-radius:25px;
    margin-bottom:25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 15px 30px rgba(0,0,0,.12);
    position:relative;
    overflow:hidden;
}

.hero-transaksi::before{
    content:'';
    position:absolute;
    width:180px;
    height:180px;
    border-radius:50%;
    background:rgba(255,255,255,.15);
    right:-50px;
    top:-50px;
}

.hero-transaksi h1{
    margin:0;
    font-size:32px;
}

.hero-transaksi p{
    margin-top:8px;
    opacity:.9;
}

.hero-count{
    background:rgba(255,255,255,.2);
    padding:15px 25px;
    border-radius:15px;
    backdrop-filter:blur(10px);
    font-size:22px;
    font-weight:bold;
}

/* TABLE CARD */
.table-box{
    background:rgba(255,255,255,.95);
    backdrop-filter:blur(10px);
    padding:25px;
    border-radius:25px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

/* TABLE */
.table{
    width:100%;
    border-collapse:collapse;
}

.table th{
    background:linear-gradient(135deg,#0f172a,#334155);
    color:white;
    padding:14px;
    font-size:14px;
}

.table td{
    padding:14px;
    text-align:center;
    border-bottom:1px solid #eee;
    transition:.3s;
}

.table tr{
    transition:.3s;
}

.table tr:hover{
    background:#f5faff;
}

/* BUTTON */
.btn{
    border:none;
    padding:8px 14px;
    border-radius:10px;
    color:white;
    cursor:pointer;
    transition:.3s;
    font-weight:500;
}

.btn:hover{
    transform:translateY(-2px);
}

.btn-blue{
    background:linear-gradient(135deg,#4facfe,#00c6fb);
}

.btn-green{
    background:linear-gradient(135deg,#00c853,#69f0ae);
}

.btn-red{
    background:linear-gradient(135deg,#ff5252,#ff1744);
}

/* BADGE */
.badge{
    padding:7px 14px;
    border-radius:20px;
    color:white;
    font-size:12px;
    font-weight:600;
}

.badge-blue{
    background:linear-gradient(135deg,#4facfe,#00c6fb);
}

.badge-green{
    background:linear-gradient(135deg,#00c853,#69f0ae);
}

.badge-red{
    background:linear-gradient(135deg,#ff5252,#ff1744);
}

.badge-orange{
    background:linear-gradient(135deg,#ff9800,#ffc107);
}

/* IMAGE */
img{
    border-radius:12px;
    transition:.3s;
    box-shadow:0 8px 20px rgba(0,0,0,.15);
}

img:hover{
    transform:scale(1.08);
}

/* TOTAL */
.total-price{
    font-weight:bold;
    color:#0f172a;
}

/* DENDA */
.fine{
    color:#e74c3c;
    font-weight:bold;
}

@media(max-width:768px){

.hero-transaksi{
    flex-direction:column;
    gap:15px;
    text-align:center;
}

.table-box{
    overflow-x:auto;
}

}
/* ==========================
   ANIMASI DATA TRANSAKSI
========================== */

/* Hero */
.hero-transaksi{
    opacity:0;
    transform:translateY(-30px);
    animation:fadeDown .8s ease forwards;
}

.hero-transaksi::before{
    animation:float 6s ease-in-out infinite;
}

/* Counter */
.hero-count{
    animation:pulse 2s infinite;
}

/* Card Tabel */
.table-box{
    opacity:0;
    transform:translateY(30px);
    animation:fadeUp .8s ease forwards;
    animation-delay:.3s;
}

/* Baris Tabel */
tbody tr{
    opacity:0;
    transform:translateY(20px);
    animation:fadeUp .5s ease forwards;
}

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

/* Hover Tabel */
.table tr:hover{
    background:#eef8ff;
    transform:scale(1.01);
}

/* Tombol */
.btn{
    transition:.3s;
}

.btn:hover{
    transform:translateY(-3px) scale(1.05);
    box-shadow:0 8px 20px rgba(0,0,0,.15);
}

/* Badge */
.badge{
    display:inline-block;
    animation:float 3s infinite ease-in-out;
}

.badge:hover{
    transform:scale(1.08);
}

/* Gambar Bukti */
img{
    transition:.4s;
}

img:hover{
    transform:scale(1.15) rotate(2deg);
}

/* Total Harga */
.total-price{
    transition:.3s;
}

tr:hover .total-price{
    color:#2563eb;
    transform:scale(1.05);
}

/* Denda */
.fine{
    animation:blinkFine 2s infinite;
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
    0%,100%{
        transform:scale(1);
    }
    50%{
        transform:scale(1.05);
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

@keyframes blinkFine{
    0%,100%{
        opacity:1;
    }
    50%{
        opacity:.7;
    }
}
</style>
@endsection

@section('content')

<div class="hero-transaksi">

    <div>
        <h1>📄 Data Transaksi</h1>
        <p>Kelola transaksi penyewaan kamera dan alat camping</p>
    </div>

    <div class="hero-count">
        {{ count($data) }} Transaksi
    </div>

</div>
@if(session('error'))
<div style="
    background:#fee2e2;
    color:#b91c1c;
    padding:15px;
    border-radius:12px;
    margin-bottom:15px;
    font-weight:600;">
    {{ session('error') }}
</div>
@endif

@if(session('success'))
<div style="
    background:#dcfce7;
    color:#166534;
    padding:15px;
    border-radius:12px;
    margin-bottom:15px;
    font-weight:600;">
    {{ session('success') }}
</div>
@endif
<div class="table-box">

<table class="table">

    <thead>
        <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Produk</th>
            <th>Qty</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Total</th>
            <th>Status</th>
            <th>Denda</th>
            <th>Bukti</th>
            <th>KTP Penyewa</th>
            <th>Pembayaran</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($data as $i => $item)

        <tr>

            <td>{{ $i+1 }}</td>

            <td>{{ $item->user->name ?? '-' }}</td>

            <td>{{ $item->product->name ?? '-' }}</td>

            <td>{{ $item->qty }}</td>

            <td>{{ $item->rent_date }}</td>

            <td>{{ $item->return_date }}</td> 

            <td class="total-price">
                Rp {{ number_format($item->price + $item->fine,0,',','.') }}
            </td>

            <td>

                @if($item->status == 'dipinjam')

                    <span class="badge badge-blue">
                        Dipinjam
                    </span>

                @elseif($item->status == 'menunggu_konfirmasi')

                    <form action="/admin/konfirmasi-kembali/{{ $item->id }}" method="POST">
                        @csrf
                        <button class="btn btn-green">
                            Konfirmasi
                        </button>
                    </form>

                @elseif($item->status == 'dikembalikan')

                    <span class="badge badge-green">
                        Selesai
                    </span>

                @elseif($item->status == 'ditolak')

                    <span class="badge badge-red">
                        Ditolak
                    </span>

                    @elseif($item->status == 'dibatalkan')

    <span class="badge badge-red">
        Dibatalkan
    </span>

                @endif

            </td>

            <td class="fine">
                Rp {{ number_format($item->fine ?? 0,0,',','.') }}
            </td>

            <!-- BUKTI -->
            <td>

                @if($item->payment_proof)

                    <img
                    src="{{ asset('storage/'.$item->payment_proof) }}"
                    width="70">

                @else

                    -

                @endif

            </td>
            <!-- KTP PENYEWA -->
            <td>

                 @if($item->ktp_image)

                  <img
                     src="{{ asset('storage/'.$item->ktp_image) }}"
                    width="70">

                  @else

                    <span class="badge badge-orange">
                        Belum Upload
                      </span>

    @endif

</td>

            <!-- PEMBAYARAN -->
            <td>

               @if($item->payment_status == 'pending' && $item->status != 'dibatalkan')

                    <form action="{{ url('/admin/acc/'.$item->id) }}"
                    method="POST"
                    style="display:inline;">

                        @csrf

                        <button class="btn btn-green">
                            ✔
                        </button>

                    </form>

                    <form action="{{ url('/admin/tolak/'.$item->id) }}"
                    method="POST"
                    style="display:inline;">

                        @csrf

                        <button class="btn btn-red">
                            ✖
                        </button>

                    </form>

                @elseif($item->payment_status == 'approved')

                    <span class="badge badge-green">
                        Lunas
                    </span>

                @elseif($item->payment_status == 'rejected')

                    <span class="badge badge-red">
                        Ditolak
                    </span>

                @else

                    <span class="badge badge-orange">
                        Belum
                    </span>

                @endif

            </td>

            <td>

                @if($item->status == 'dipinjam')

                    <form action="/kembalikan/{{ $item->id }}"
                    method="POST">

                        @csrf

                        <button class="btn btn-blue">
                            Kembalikan
                        </button>

                    </form>

                @else

                    ✔

                @endif

            </td>

        </tr>

        @endforeach

    </tbody>

</table>

</div>

@endsection