@extends('layouts.admin')

@section('title','Data Produk')

@section('style')
<style>

/* HERO */
.hero-product{
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

.hero-product::before{
    content:'';
    position:absolute;
    width:180px;
    height:180px;
    border-radius:50%;
    background:rgba(255,255,255,.15);
    top:-50px;
    right:-50px;
}

.hero-product h1{
    margin:0;
    font-size:32px;
}

.hero-product p{
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

/* HEADER */
.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
    gap:15px;
}

/* SEARCH */
.search-box input{
    width:280px;
    padding:12px 18px;
    border:none;
    border-radius:12px;
    outline:none;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.page-title{
    margin:0;
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

.btn-add{
    background:linear-gradient(135deg,#43e97b,#38f9d7);
    box-shadow:0 6px 15px rgba(67,233,123,0.3);
}

.btn-edit{
    background:linear-gradient(135deg,#4facfe,#00c6fb);
}

.btn-delete{
    background:linear-gradient(135deg,#ff6b6b,#ff758c);
}

/* CARD */
.product-card{
    background:rgba(255,255,255,.95);
    backdrop-filter:blur(10px);
    border-radius:25px;
    padding:25px;
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

table th{
    background:linear-gradient(135deg,#1e293b,#334155);
    color:white;
    padding:14px;
    font-size:14px;
}

table td{
    padding:14px;
    text-align:center;
    border-bottom:1px solid #eee;
    vertical-align:middle;
}

table tr{
    transition:.3s;
}

table tr:hover{
    background:#f8fbff;
}

/* IMAGE */
.product-img{
    width:85px;
    height:85px;
    object-fit:cover;
    border-radius:15px;
    transition:0.3s;
    box-shadow:0 8px 20px rgba(0,0,0,0.15);
}

.product-img:hover{
    transform:scale(1.08);
}

/* ALERT */
.alert-success{
    background:linear-gradient(135deg,#d4edda,#e8fff0);
    color:#155724;
    padding:14px;
    border-radius:12px;
    margin-bottom:20px;
    font-weight:500;
    border-left:5px solid #28a745;
}

/* STOCK */
.stock{
    padding:6px 12px;
    border-radius:20px;
    color:white;
    font-size:13px;
    font-weight:500;
}

.stock-ready{
    background:linear-gradient(135deg,#00c853,#69f0ae);
}

.stock-empty{
    background:linear-gradient(135deg,#ff5252,#ff1744);
}

/* RESPONSIVE */
@media(max-width:768px){

.hero-product{
    flex-direction:column;
    text-align:center;
    gap:15px;
}

.page-header{
    flex-direction:column;
    align-items:flex-start;
}

.search-box{
    width:100%;
}

.search-box input{
    width:100%;
}

}

</style>
@endsection

@section('content')

<div class="hero-product">

    <div>
        <h1>📦 Data Produk</h1>
        <p>Kelola seluruh produk rental kamera dan alat camping</p>
    </div>

    <div class="hero-count">
        {{ count($products) }} Produk
    </div>

</div>

<div class="page-header">

    <div class="search-box">
        <input type="text" placeholder="🔍 Cari Produk...">
    </div>

    <a href="/product/create" class="btn btn-add">
        ➕ Tambah Produk
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
                ✏ Edit
            </a>

            <form
            action="/product/{{ $product->id }}"
            method="POST"
            style="display:inline;">

                @csrf
                @method('DELETE')

                <button class="btn btn-delete">
                    🗑 Hapus
                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

</div>

</div>

@endsection