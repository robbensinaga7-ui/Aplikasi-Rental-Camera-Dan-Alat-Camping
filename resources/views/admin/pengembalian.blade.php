@extends('layouts.admin')

@section('title','Data Pengembalian')

@section('style')
<style>

/* HERO */
.hero-return{
    background:linear-gradient(135deg,#ff9966,#ff5e62);
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

.hero-return::before{
    content:'';
    position:absolute;
    width:180px;
    height:180px;
    border-radius:50%;
    background:rgba(255,255,255,.15);
    top:-50px;
    right:-50px;
}

.hero-return h1{
    margin:0;
    font-size:32px;
}

.hero-return p{
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

/* CARD */
.return-card{
    background:rgba(255,255,255,.95);
    backdrop-filter:blur(10px);
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
    font-size:14px;
    white-space:nowrap;
}

td{
    padding:14px;
    text-align:center;
    border-bottom:1px solid #eee;
    vertical-align:middle;
    color:#334155;
}

tr{
    transition:.3s;
}

tr:hover{
    background:#f5faff;
}

/* BADGE */
.badge{
    padding:7px 14px;
    border-radius:20px;
    font-size:12px;
    color:white;
    font-weight:600;
    display:inline-block;
}

.badge-orange{
    background:linear-gradient(135deg,#ff9800,#ffc107);
}

/* BUTTON */
.btn{
    border:none;
    padding:10px 16px;
    border-radius:10px;
    cursor:pointer;
    color:white;
    font-size:13px;
    font-weight:600;
    transition:.3s;
}

.btn:hover{
    transform:translateY(-2px);
}

.btn-green{
    background:linear-gradient(135deg,#00c853,#69f0ae);
    box-shadow:0 5px 15px rgba(0,200,83,.3);
}

/* EMPTY */
.empty-data{
    text-align:center;
    padding:35px;
    color:#94a3b8;
    font-size:15px;
}

/* NUMBER */
.number{
    font-weight:bold;
    color:#0f172a;
}

@media(max-width:768px){

.hero-return{
    flex-direction:column;
    gap:15px;
    text-align:center;
}

.hero-return h1{
    font-size:28px;
}

th,
td{
    padding:10px;
    font-size:12px;
}

.btn{
    padding:8px 12px;
    font-size:12px;
}

}
/* ==========================
   ANIMASI DATA PENGEMBALIAN
========================== */

/* Hero */
.hero-return{
    opacity:0;
    transform:translateY(-30px);
    animation:fadeDown .8s ease forwards;
}

.hero-return::before{
    animation:float 6s ease-in-out infinite;
}

/* Counter */
.hero-count{
    animation:pulse 2s infinite;
}

/* Card */
.return-card{
    opacity:0;
    transform:translateY(30px);
    animation:fadeUp .8s ease forwards;
    animation-delay:.3s;
}

/* Header tabel */
th{
    position:sticky;
    top:0;
    z-index:1;
}

/* Baris tabel */
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

/* Hover tabel */
tr:hover{
    background:#fff5f0;
    transform:scale(1.01);
    box-shadow:0 5px 15px rgba(0,0,0,.05);
}

/* Tombol */
.btn{
    transition:.3s;
}

.btn:hover{
    transform:translateY(-3px) scale(1.05);
}

/* Badge */
.badge{
    transition:.3s;
}

.badge:hover{
    transform:scale(1.08);
}

/* Nomor */
.number{
    transition:.3s;
}

tr:hover .number{
    color:#ff5e62;
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
    0%,100%{
        transform:translateY(0);
    }
    50%{
        transform:translateY(-15px);
    }
}
</style>
@endsection

@section('content')

<div class="hero-return">

    <div>
        <h1>📤 Data Pengembalian</h1>
        <p>Kelola pengembalian alat camping dan kamera dari pelanggan</p>
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
            <th>Customer</th>
            <th>Produk</th>
            <th>Qty</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

    @forelse ($data as $i => $item)

    <tr>

        <td class="number">{{ $i+1 }}</td>

        <td>{{ $item->user->name ?? '-' }}</td>

        <td>{{ $item->product->name ?? '-' }}</td>

        <td>{{ $item->qty }}</td>

        <td>{{ $item->rent_date }}</td>

        <td>{{ $item->return_date }}</td>

        <td>
            @if($item->status == 'menunggu_konfirmasi')
                <span class="badge badge-orange">
                    Menunggu
                </span>
            @elseif($item->status == 'dikembalikan')
                <span class="badge"
                      style="background:linear-gradient(135deg,#00c853,#69f0ae);">
                    Dikembalikan
                </span>
            @endif
        </td>

        <td>

            @if($item->status == 'menunggu_konfirmasi')

            <form action="/admin/konfirmasi-kembali/{{ $item->id }}" method="POST">
                @csrf
                <button class="btn btn-green">
                    ✔ Konfirmasi
                </button>
            </form>

            @else

            <span style="color:#00c853;font-weight:bold;">
                ✓ Selesai
            </span>

            @endif

        </td>

    </tr>

    @empty

    <tr>
        <td colspan="8" class="empty-data">
            📭 Tidak ada data pengembalian
        </td>
    </tr>

    @endforelse

    </tbody>

</table>

</div>

</div>

@endsection