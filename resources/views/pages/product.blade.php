@extends('layouts.app')

@section('title', 'Product')

@section('content')

<style>

/* TITLE */
.title{
text-align:center;
padding:90px 20px 30px;
background: linear-gradient(135deg,#56ccf2,#2f80ed);
color:white;
border-bottom-left-radius:50px;
border-bottom-right-radius:50px;
position:relative;
overflow:hidden;
}

/* bubble background */
.title::before{
content:"";
position:absolute;
width:300px;
height:300px;
background:rgba(255,255,255,0.1);
border-radius:50%;
top:-100px;
left:-80px;
animation:float 6s infinite ease-in-out;
}

.title::after{
content:"";
position:absolute;
width:250px;
height:250px;
background:rgba(255,255,255,0.1);
border-radius:50%;
bottom:-80px;
right:-50px;
animation:float 8s infinite ease-in-out;
}

.title h1{
font-size:52px;
margin-bottom:10px;
color:#fff8dc;
position:relative;
z-index:2;
animation:slideUp 1s ease;
}

.title p{
font-size:18px;
position:relative;
z-index:2;
opacity:0.95;
animation:fadeIn 2s ease;
}

/* SEARCH */
.search-box{
display:flex;
justify-content:center;
margin:40px 0;
}

.search-box input{
width:350px;
padding:14px 20px;
border:none;
border-radius:50px;
font-size:15px;
background:white;
box-shadow:0 10px 25px rgba(0,0,0,0.08);
transition:0.4s;
outline:none;
}

.search-box input:focus{
width:420px;
box-shadow:0 15px 35px rgba(0,0,0,0.12);
}

/* STATS */
.product-stats{
    display:flex;
    justify-content:center;
    gap:25px;
    flex-wrap:wrap;
    padding:20px 20px 50px;
    background:#f8fbff;
}

.stat-box{
    width:220px;
    padding:25px;
    border-radius:25px;
    text-align:center;

    background:linear-gradient(
        135deg,
        #56ccf2,
        #2f80ed
    );

    color:white;

    box-shadow:0 15px 35px rgba(47,128,237,.25);

    transition:.4s;
}

.stat-box:hover{
    transform:translateY(-10px);
}

.stat-box h2{
    font-size:42px;
    margin-bottom:8px;
    color:white;
    font-weight:700;
}

.stat-box p{
    font-size:16px;
    color:white;
    opacity:.95;
    font-weight:500;
}
/* CATEGORY BADGE */
.badge-category{
    display:inline-block;
    padding:8px 14px;
    border-radius:20px;
    background:#e8f2ff;
    color:#2f80ed;
    font-size:13px;
    font-weight:600;
    margin-bottom:10px;
}

/* STOCK BADGE */
.badge-stock{
    display:inline-block;
    padding:8px 14px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
    margin-bottom:10px;
}

.stock-ready{
    background:#d4edda;
    color:#155724;
}

.stock-empty{
    background:#f8d7da;
    color:#721c24;
}
/* PRODUCT CONTAINER */
.product-container{
display:flex;
justify-content:center;
flex-wrap:wrap;
gap:30px;
padding:20px 30px 80px;
background:#f8fbff;
}

/* PRODUCT CARD */
.product-card{
width:340px;
background:white;
border-radius:25px;
overflow:hidden;
box-shadow:0 15px 35px rgba(0,0,0,.08);
transition:.4s;
position:relative;
}

/* glow effect */
.product-card::before{
content:"";
position:absolute;
top:0;
left:-100%;
width:100%;
height:100%;
background:linear-gradient(
120deg,
transparent,
rgba(255,255,255,0.4),
transparent
);
transition:0.6s;
z-index:1;
}

.product-card:hover::before{
left:100%;
}

.product-card:hover{
transform:translateY(-12px) scale(1.04);
box-shadow:0 20px 40px rgba(0,0,0,0.15);
}

/* IMAGE */
.product-card img{
width:100%;
height:260px;
object-fit:cover;
transition:.4s;
}

.product-card:hover img{
transform:scale(1.08);
}

/* BODY */
.product-body{
padding:20px;
position:relative;
z-index:2;
}

.product-body h3{
font-size:24px;
margin-bottom:10px;
color:#2c3e50;
}

.product-body p{
font-size:14px;
color:#666;
margin-bottom:6px;
line-height:1.5;
}

/* PRICE */
.price{
margin-top:15px;
font-size:20px;
font-weight:bold;
color:#2f80ed;
}

/* BUTTON */
.btn{
display:inline-block;
margin-top:18px;
padding:12px 24px;
border-radius:50px;
background:linear-gradient(135deg,#56ccf2,#2f80ed);
color:white;
text-decoration:none;
font-weight:600;
transition:0.3s;
box-shadow:0 8px 20px rgba(0,0,0,0.15);
}

.btn:hover{
transform:scale(1.08);
box-shadow:0 12px 25px rgba(0,0,0,0.2);
}

/* DISABLED BUTTON */
button.btn{
border:none;
cursor:not-allowed;
background:linear-gradient(135deg,#cfd9df,#e2ebf0);
color:#555;
}

/* ANIMATION */
@keyframes float{
0%{transform:translateY(0);}
50%{transform:translateY(-20px);}
100%{transform:translateY(0);}
}

@keyframes slideUp{
from{
opacity:0;
transform:translateY(40px);
}
to{
opacity:1;
transform:translateY(0);
}
}

@keyframes fadeIn{
from{opacity:0;}
to{opacity:1;}
}

</style>

<!-- TITLE -->
<div class="title" data-aos="fade-up">

<h1>🏕 Katalog Produk</h1>

<p>
Temukan peralatan camping terbaik untuk petualanganmu
</p>

</div>

<!-- SEARCH -->
<div class="search-box" data-aos="fade-up">
<input type="text" id="searchInput" placeholder="🔍 Cari produk...">
</div>

<!-- STATS -->
<div class="product-stats">

<div class="stat-box" data-aos="zoom-in">
<h2>{{ count($products) }}</h2>
<p>Total Produk</p>
</div>

<div class="stat-box" data-aos="zoom-in" data-aos-delay="100">
<h2>{{ $products->where('stock','>',0)->count() }}</h2>
<p>Produk Tersedia</p>
</div>

<div class="stat-box" data-aos="zoom-in" data-aos-delay="200">
<h2>{{ $products->where('stock','<=',0)->count() }}</h2>
<p>Stok Habis</p>
</div>

</div>


<!-- PRODUCT LIST -->
<div class="product-container">

@forelse($products as $product)


<div class="product-card product-item"
data-name="{{ $product->name }}"
data-aos="zoom-in">



<img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/250' }}"
alt="product">

<div class="product-body">

<h3>{{ $product->name }}</h3>

<span class="badge-category">
    📁 Kategori: {{ $product->category->name ?? '-' }}
</span>

<br>

@if($product->stock > 0)

<span class="badge-stock stock-ready">
    ✅ Stok: {{ $product->stock }}
</span>

@else

<span class="badge-stock stock-empty">
    ❌ Stok Habis
</span>

@endif

<p style="min-height:50px;">
    {{ $product->description }}
</p>

<div class="price">
Rp {{ number_format($product->price,0,',','.') }} / hari
</div>

@if($product->stock > 0)

    @auth

    <a href="/booking/{{ $product->id }}" class="btn">
        🚀 Sewa Sekarang yok
    </a>

    @endauth

    @guest

    <a href="/register"
       class="btn"
       onclick="return confirm('Silakan daftar atau login terlebih dahulu untuk menyewa produk.')">
        🔐 Daftar Untuk Menyewa
    </a>

    @endguest

@else

    <button class="btn" disabled>
        ❌ Stok Habis
    </button>

@endif

</div>
</div>



@empty

<p style="text-align:center; width:100%; font-size:18px; color:#555;">
Produk tidak tersedia
</p>

@endforelse

</div>

@endsection

@section('scripts')

<script>

const searchInput = document.getElementById("searchInput");
const products = document.querySelectorAll(".product-item");

searchInput.addEventListener("keyup", function () {

let value = this.value.toLowerCase();

products.forEach(product => {

let name = product.getAttribute("data-name").toLowerCase();

product.style.display = name.includes(value)
? "block"
: "none";

});

});

</script>

@endsection