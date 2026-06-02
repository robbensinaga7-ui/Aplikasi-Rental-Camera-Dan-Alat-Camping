@extends('layouts.admin')

@section('title','Data Peminjaman')

@section('style')
<style>

/* HERO */
.hero-loan{
    background:linear-gradient(135deg,#36d1dc,#5b86e5);
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

.hero-loan::before{
    content:'';
    position:absolute;
    width:180px;
    height:180px;
    border-radius:50%;
    background:rgba(255,255,255,.15);
    top:-50px;
    right:-50px;
}

.hero-loan h1{
    margin:0;
    font-size:32px;
}

.hero-loan p{
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
.loan-card{
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

.badge-blue{
    background:linear-gradient(135deg,#4facfe,#00c6fb);
}

.badge-green{
    background:linear-gradient(135deg,#00c853,#69f0ae);
}

/* EMPTY */
.empty-data{
    text-align:center;
    padding:35px;
    color:#94a3b8;
    font-size:15px;
}

/* ROW NUMBER */
.number{
    font-weight:bold;
    color:#0f172a;
}

/* RESPONSIVE */
@media(max-width:768px){

.hero-loan{
    flex-direction:column;
    gap:15px;
    text-align:center;
}

.hero-loan h1{
    font-size:28px;
}

th,
td{
    padding:10px;
    font-size:12px;
}

}

</style>
@endsection

@section('content')

<div class="hero-loan">

    <div>
        <h1>📦 Data Peminjaman</h1>
        <p>Kelola seluruh data peminjaman alat camping dan kamera</p>
    </div>

    <div class="hero-count">
        {{ count($data) }} Data
    </div>

</div>

<div class="loan-card">

<div class="table-box">

<table>

    <tr>
        <th>No</th>
        <th>Customer</th>
        <th>Produk</th>
        <th>Qty</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
        <th>Keterangan</th>
    </tr>

    @php $found = false; @endphp

    @foreach ($data as $i => $item)

        @if($item->status == 'dipinjam')

        @php $found = true; @endphp

        <tr>

            <td class="number">
                {{ $i+1 }}
            </td>

            <td>
                {{ $item->user->name ?? '-' }}
            </td>

            <td>
                {{ $item->product->name ?? '-' }}
            </td>

            <td>
                {{ $item->qty }}
            </td>

            <td>
                {{ $item->rent_date }}
            </td>

            <td>
                {{ $item->return_date }}
            </td>

            <td>
                <span class="badge badge-blue">
                    Dipinjam
                </span>
            </td>

            <td>
                <span class="badge badge-green">
                    Aktif
                </span>
            </td>

        </tr>

        @endif

    @endforeach

    @if(!$found)

    <tr>
        <td colspan="8" class="empty-data">
            📭 Tidak ada data peminjaman
        </td>
    </tr>

    @endif

</table>

</div>

</div>

@endsection