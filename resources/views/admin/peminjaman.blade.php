@extends('layouts.admin')

@section('title','Data Peminjaman')

@section('style')
<style>

/* PAGE TITLE */
.page-title{
    margin-bottom:20px;
    font-size:28px;
    font-weight:700;
    color:#1e293b;
}

/* CARD */
.loan-card{
    background:linear-gradient(135deg,#ffffff,#f9fbfd);
    border-radius:20px;
    padding:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
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
    color:#334155;
}

tr{
    transition:0.3s;
}

tr:hover{
    background:#f8fbff;
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

/* BUTTON */
.btn{
    border:none;
    padding:9px 14px;
    border-radius:10px;
    cursor:pointer;
    color:white;
    font-size:13px;
    font-weight:500;
    transition:0.3s;
}

.btn:hover{
    transform:translateY(-2px);
    opacity:0.95;
}

.btn-blue{
    background:linear-gradient(135deg,#3498db,#6dd5fa);
    box-shadow:0 5px 15px rgba(52,152,219,0.3);
}

/* EMPTY */
.empty-data{
    text-align:center;
    padding:30px;
    color:#94a3b8;
    font-size:15px;
}

/* RESPONSIVE */
@media(max-width:768px){

.page-title{
    font-size:22px;
}

th,
td{
    padding:10px;
    font-size:12px;
}

.btn{
    padding:7px 10px;
    font-size:12px;
}

}

</style>
@endsection

@section('content')

<h1 class="page-title">
    📦 Data Peminjaman
</h1>

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
        <th>Aksi</th>
    </tr>

    @php $found = false; @endphp

    @foreach ($data as $i => $item)

        @if($item->status == 'dipinjam')

        @php $found = true; @endphp

        <tr>

            <td>{{ $i+1 }}</td>

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

                <form action="/kembalikan/{{ $item->id }}" method="POST">

                    @csrf

                    <button class="btn btn-blue">
                        Ajukan Kembali
                    </button>

                </form>

            </td>

        </tr>

        @endif

    @endforeach

    @if(!$found)

    <tr>
        <td colspan="8" class="empty-data">
            Tidak ada data peminjaman
        </td>
    </tr>

    @endif

</table>

</div>

</div>

@endsection