<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product - Camping Rental</title>

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>

/* RESET */
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family: 'Segoe UI', sans-serif;
}

body{
background: linear-gradient(135deg,#2f80ed,#56ccf2);
color:white;
min-height:100vh;
}

/* NAVBAR */
nav{
display:flex;
justify-content:space-between;
align-items:center;
padding:20px 60px;
background: rgba(0,0,0,0.2);
backdrop-filter: blur(8px);
}

.logo{
font-size:26px;
font-weight:bold;
}

.menu a{
color:white;
text-decoration:none;
margin-left:25px;
transition:0.3s;
}

.menu a:hover{
color:#ffd166;
}

/* TITLE */
.title{
text-align:center;
padding:60px 20px 10px;
}

.title h1{
font-size:42px;
color:#fff8dc;
}

.title p{
opacity:0.9;
}

/* SEARCH */
.search-box{
display:flex;
justify-content:center;
margin:20px 0 40px;
}

.search-box input{
padding:12px 20px;
width:320px;
border-radius:20px;
border:none;
outline:none;
font-size:14px;
}

/* PRODUCT GRID */
.product-container{
display:flex;
justify-content:center;
flex-wrap:wrap;
gap:25px;
padding:20px 20px 80px;
}

.product-card{
background: rgba(255,255,255,0.15);
width:250px;
border-radius:20px;
overflow:hidden;
backdrop-filter: blur(10px);
transition:0.4s;
}

.product-card:hover{
transform: translateY(-10px) scale(1.05);
background: rgba(255,255,255,0.3);
}

.product-card img{
width:100%;
height:180px;
object-fit:cover;
}

.product-body{
padding:15px;
text-align:center;
}

.product-body h3{
margin-bottom:10px;
}

.product-body p{
font-size:14px;
opacity:0.9;
margin-bottom:10px;
}

.price{
font-weight:bold;
color:#ffd166;
}

/* BUTTON */
.btn{
display:inline-block;
margin-top:10px;
padding:10px 18px;
border-radius:20px;
background:#ffd166;
color:#333;
text-decoration:none;
font-weight:bold;
transition:0.3s;
}

.btn:hover{
transform:scale(1.05);
background:#ffda6a;
}

</style>
</head>

<body>

<!-- NAVBAR -->
<nav>
<div class="logo">🏕 Camping Rental</div>

<div class="menu">
<a href="/home">Home</a>
<a href="/about">About</a>
<a href="/product">Product</a>
<a href="/admin">Dashboard</a>
<a href="/contact">Contact</a>
</div>
</nav>

<!-- TITLE -->
<div class="title" data-aos="fade-up">
<h1>Katalog Produk</h1>
<p>Temukan peralatan camping terbaik untuk petualanganmu</p>
</div>

<!-- SEARCH -->
<div class="search-box" data-aos="fade-up">
    <div style="text-align:center; margin-bottom:20px;">
    <a href="/product/create" class="btn">+ Tambah Produk</a>
</div>
<input type="text" id="searchInput" placeholder="Cari produk...">
</div>

<!-- PRODUCT LIST -->
<div class="product-container">

@forelse($products as $product)

<div class="product-card product-item"
     data-name="{{ $product->name }}"
     data-aos="zoom-in">

    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/250' }}" alt="product">

    <div class="product-body">
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->description }}</p>
        <p>Stok: {{ $product->stock }}</p>

        <div class="price">
            Rp {{ number_format($product->price,0,',','.') }} / hari
        </div>

       @if($product->stock > 0)
    <a href="#" class="btn">Sewa</a>
@else
    <button class="btn" disabled>Habis</button>
@endif
    </div>

</div>

@empty
    <p style="text-align:center; width:100%;">Tidak ada produk</p>
@endforelse

</div>

<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({
duration:1000,
once:true
});
</script>

<!-- SEARCH JS -->
<script>
const searchInput = document.getElementById("searchInput");
const products = document.querySelectorAll(".product-item");

searchInput.addEventListener("keyup", function () {
    let value = this.value.toLowerCase();

    products.forEach(product => {
        let name = product.getAttribute("data-name").toLowerCase();

        if (name.includes(value)) {
            product.style.display = "block";
        } else {
            product.style.display = "none";
        }
    });
});
</script>

</body>
</html>