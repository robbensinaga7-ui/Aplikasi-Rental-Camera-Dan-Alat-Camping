<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Produk Camping</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

/* BACKGROUND */
body{
display:flex;
min-height:100vh;
background: linear-gradient(135deg,#f6f9fc,#eef3f8);
}

/* SIDEBAR (SAMA DASHBOARD) */
.sidebar{
width:260px;
background: linear-gradient(180deg,#1e2a38,#2c3e50);
color:white;
padding:20px;
}

.sidebar h2{
text-align:center;
margin-bottom:25px;
}

.sidebar a{
display:flex;
align-items:center;
gap:10px;
color:white;
text-decoration:none;
padding:12px;
margin:6px 0;
border-radius:10px;
transition:0.3s;
}

.sidebar a:hover{
background:rgba(255,255,255,0.15);
transform:translateX(5px);
}

/* CONTENT */
.content{
flex:1;
padding:25px;
}

/* TITLE */
h1{
color:#2c3e50;
margin-bottom:10px;
}

/* CONTAINER */
.product-container{
display:flex;
flex-wrap:wrap;
gap:20px;
margin-top:20px;
}

/* CARD PRODUK (UPGRADE) */
.product{
background: linear-gradient(135deg,#ffffff,#f9fbfd);
padding:18px;
border-radius:16px;
box-shadow:0 10px 25px rgba(0,0,0,0.06);
transition:all 0.3s ease;
animation:fade 0.5s ease;

flex:1 1 280px;
max-width:300px;
position:relative;
overflow:hidden;
}

/* EFFECT KILAP */
.product::before{
content:"";
position:absolute;
top:0;
left:-100%;
width:100%;
height:100%;
background:linear-gradient(120deg,transparent,rgba(255,255,255,0.4),transparent);
transition:0.5s;
}

.product:hover::before{
left:100%;
}

/* HOVER */
.product:hover{
transform:translateY(-8px) scale(1.03);
box-shadow:0 15px 35px rgba(0,0,0,0.12);
}

/* GAMBAR */
.product img{
width:100%;
height:160px;
object-fit:cover;
border-radius:12px;
margin-bottom:10px;
transition:0.3s;
}

.product img:hover{
transform:scale(1.05);
}

/* TEXT */
.product h3{
margin-bottom:5px;
color:#2c3e50;
}

.product p{
font-size:14px;
color:#666;
}

/* INPUT */
input{
width:100%;
padding:8px;
margin:6px 0;
border-radius:8px;
border:1px solid #ddd;
transition:0.3s;
}

input:focus{
outline:none;
border-color:#3498db;
}

/* BUTTON */
button{
background:linear-gradient(135deg,#3498db,#6c9cff);
color:white;
border:none;
padding:10px;
border-radius:10px;
width:100%;
cursor:pointer;
transition:0.3s;
font-weight:500;
}

button:hover{
transform:scale(1.05);
opacity:0.9;
}

/* ANIMATION */
@keyframes fade{
from{opacity:0;transform:scale(0.95);}
to{opacity:1;transform:scale(1);}
}

</style>
</head>

<body>

<div class="sidebar">
    <h2>🏕 Rental</h2>

    <a href="/pelanggan/dashboard">🏠 Dashboard</a>
    <a href="/pelanggan/product">📦 Produk</a>
    <a href="/logout">🚪 Keluar</a>
</div>

<div class="content">

<h1>📦 Produk Camping</h1>

<div class="product-container">

@foreach($products as $product)
<div class="product">

    <img src="{{ asset('storage/' . $product->image) }}" 
         alt="{{ $product->name }}">

    <h3>{{ $product->name }}</h3>
    <p>Stok: {{ $product->stock }}</p>

    <form action="{{ route('sewa.store') }}" method="POST">
        @csrf

        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <input type="date" name="rent_date" required>
        <input type="date" name="return_date" required>
        <input type="number" name="qty" value="1" min="1">

        <button type="submit">Sewa Sekarang</button>
    </form>

</div>
@endforeach

</div>

</div>

</body>
</html>