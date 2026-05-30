@extends('layouts.pelanggan')

@section('title','Produk Camping')

@section('style')
<style>

/* PAGE TITLE */
.page-title{
    font-size:30px;
    font-weight:700;
    color:#1e293b;
    margin-bottom:10px;
}

/* SUBTITLE */
.page-subtitle{
    color:#64748b;
    margin-bottom:25px;
}

/* PRODUCT CONTAINER */
.product-container{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(350px,400px));
    justify-content:center;
    gap:25px;
}

/* PRODUCT CARD */
.product-card{
    position:relative;
    overflow:hidden;
    background:linear-gradient(135deg,#ffffff,#f9fbfd);
    border-radius:22px;
    padding:15px;
    max-width:400px;
    margin:auto;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
    transition:0.4s;
    animation:fadeUp 0.6s ease;
}

/* SHINE EFFECT */
.product-card::before{
    content:'';
    position:absolute;
    top:0;
    left:-120%;
    width:100%;
    height:100%;
    background:linear-gradient(
        120deg,
        transparent,
        rgba(255,255,255,0.35),
        transparent
    );
    transition:0.7s;
}

.product-card:hover::before{
    left:120%;
}

/* HOVER */
.product-card:hover{
    transform:translateY(-10px);
    box-shadow:0 18px 35px rgba(0,0,0,0.12);
}

/* IMAGE */
.product-img{
    width:100%;
    height:150px;
    object-fit:contain;
    background:#f8fafc;
    border-radius:16px;
    margin-bottom:15px;
    transition:0.4s;
}

.product-img:hover{
    transform:scale(1.03);
}

/* PRODUCT TITLE */
.product-info{
    font-size:14px;
    color:#64748b;
    margin-bottom:6px;
}

.product-title{
    font-size:22px;
    font-weight:700;
    color:#1e293b;
    margin-bottom:5px;
    text-align:center;
}

.product-price{
    margin:12px 0;
    font-size:20px;
    font-weight:700;
    color:#3498db;
    text-align:center;
}

/* INPUT */
.form-input{
    width:100%;
    padding:10px 14px;
    border-radius:12px;
    border:1px solid #dbe2ea;
    margin-bottom:12px;
    transition:0.3s;
    background:white;
}

.form-input:focus{
    outline:none;
    border-color:#3498db;
    box-shadow:0 0 0 4px rgba(52,152,219,0.1);
}

/* BUTTON */
.btn-sewa{
    width:100%;
    border:none;
    padding:12px;
    border-radius:14px;
    background:linear-gradient(135deg,#3498db,#6c9cff);
    color:white;
    font-size:14px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

.btn-sewa:hover{
    transform:translateY(-2px);
    opacity:0.95;
}

/* EMPTY */
.empty-product{
    text-align:center;
    padding:50px;
    background:white;
    border-radius:20px;
    color:#94a3b8;
    box-shadow:0 10px 25px rgba(0,0,0,0.05);
}

/* ANIMATION */
@keyframes fadeUp{

from{
    opacity:0;
    transform:translateY(20px);
}

to{
    opacity:1;
    transform:translateY(0);
}

}

/* RESPONSIVE */
@media(max-width:768px){

.page-title{
    font-size:24px;
}

.product-card{
    padding:15px;
}

.product-img{
    height:170px;
}

}

</style>
@endsection

@section('content')

<h1 class="page-title">
    📦 Produk Camping
</h1>

<p class="page-subtitle">
    Pilih perlengkapan camping terbaik untuk petualanganmu
</p>

<div class="product-container">

@forelse($products as $product)

<div class="product-card">

    <!-- IMAGE -->
    <img
    class="product-img"
    src="{{ asset('storage/' . $product->image) }}"
    alt="{{ $product->name }}">

    <!-- TITLE -->
    <h3 class="product-title">
        {{ $product->name }}
    </h3>

    <!-- INFO -->
    <p class="product-info">
        📦 Stok : {{ $product->stock }}
    </p>

    <p class="product-price">
        Rp {{ number_format($product->price,0,',','.') }}
    </p>

    <!-- FORM -->
    <form action="{{ route('sewa.store') }}" method="POST">

        @csrf

        <input
        type="hidden"
        name="product_id"
        value="{{ $product->id }}">

        <input
        type="date"
        name="rent_date"
        class="form-input"
        required>

        <input
        type="date"
        name="return_date"
        class="form-input"
        required>

        <input
        type="number"
        name="qty"
        value="1"
        min="1"
        class="form-input">

        <button type="submit" class="btn-sewa">
            Sewa Sekarang
        </button>

    </form>

</div>

@empty

<div class="empty-product">
    Tidak ada produk tersedia
</div>

@endforelse

</div>

@endsection