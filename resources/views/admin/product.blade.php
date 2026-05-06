@extends('layouts.admin')

@section('title','Data Produk')

@section('style')
<style>

/* HEADER */
.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
    gap:15px;
}

/* TITLE */
.page-title{
    margin:0;
}

/* BUTTON TAMBAH */
.btn-add{
    background:linear-gradient(135deg,#43e97b,#38f9d7);
    box-shadow:0 6px 15px rgba(67,233,123,0.3);
}

.btn-add:hover{
    transform:translateY(-3px);
}

/* TABLE CARD */
.product-card{
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

/* HEADER TABLE */
table th{
    background:linear-gradient(135deg,#1e293b,#334155);
    color:white;
    padding:14px;
    font-size:14px;
}

/* TABLE BODY */
table td{
    padding:14px;
    text-align:center;
    border-bottom:1px solid #eee;
    vertical-align:middle;
}

/* HOVER */
table tr:hover{
    background:#f8fbff;
    transition:0.3s;
}

/* IMAGE */
.product-img{
    width:75px;
    height:75px;
    object-fit:cover;
    border-radius:12px;
    transition:0.3s;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
}

.product-img:hover{
    transform:scale(1.08);
}

/* BUTTON */
.btn{
    padding:8px 14px;
    border:none;
    border-radius:10px;
    color:white;
    text-decoration:none;
    cursor:pointer;
    transition:0.3s;
    font-size:14px;
}

.btn:hover{
    transform:translateY(-2px);
    opacity:0.95;
}

/* EDIT */
.btn-edit{
    background:linear-gradient(135deg,#4facfe,#00c6fb);
}

/* DELETE */
.btn-delete{
    background:linear-gradient(135deg,#ff6b6b,#ff758c);
}

/* ALERT */
.alert-success{
    background:#d4edda;
    color:#155724;
    padding:14px;
    border-radius:12px;
    margin-bottom:20px;
    font-weight:500;
}

/* STOCK BADGE */
.stock{
    padding:6px 12px;
    border-radius:20px;
    color:white;
    font-size:13px;
    font-weight:500;
}

.stock-ready{
    background:#2ecc71;
}

.stock-empty{
    background:#e74c3c;
}

/* RESPONSIVE */
@media(max-width:768px){

.page-header{
    flex-direction:column;
    align-items:flex-start;
}

}

</style>
@endsection

@section('content')

<div class="page-header">

    <h1 class="page-title">
        📦 Data Produk
    </h1>

    <a href="/product/create" class="btn btn-add">
        + Tambah Produk
    </a>

</div>

@if(session('success'))

<div class="alert-success">
    {{ session('success') }}
</div>

@endif

<div class="product-card">

<div class="table-box">

<table>

    <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    @foreach($products as $index => $product)

    <tr>

        <td>{{ $index + 1 }}</td>

        <td>

            <img
            class="product-img"
            src="{{ $product->image ? asset('storage/'.$product->image) : 'https://via.placeholder.com/80' }}">

        </td>

        <td>
            <b>{{ $product->name }}</b>
        </td>

        <td>
            Rp {{ number_format($product->price,0,',','.') }}
        </td>

        <td>

            @if($product->stock > 0)

                <span class="stock stock-ready">
                    {{ $product->stock }} Tersedia
                </span>

            @else

                <span class="stock stock-empty">
                    Habis
                </span>

            @endif

        </td>

        <td>

            <a href="/product/{{ $product->id }}/edit"
            class="btn btn-edit">
                Edit
            </a>

            <form
            action="/product/{{ $product->id }}"
            method="POST"
            style="display:inline;">

                @csrf
                @method('DELETE')

                <button class="btn btn-delete">
                    Hapus
                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

</div>

</div>

@endsection