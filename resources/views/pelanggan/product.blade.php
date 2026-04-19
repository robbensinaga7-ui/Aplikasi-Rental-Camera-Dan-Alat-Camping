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

body{
display:flex;
min-height:100vh;
background:#f5f7fb;
}

/* SIDEBAR */
.sidebar{
width:260px;
background:linear-gradient(180deg,#2c3e50,#34495e);
color:white;
padding:20px;
}

.sidebar a{
display:block;
color:white;
text-decoration:none;
padding:12px;
margin:6px 0;
border-radius:8px;
transition:0.3s;
}

.sidebar a:hover{
background:rgba(255,255,255,0.1);
transform:translateX(5px);
}

/* CONTENT */
.content{
flex:1;
padding:25px;
}

/* PRODUCT CARD */
.product{
background:white;
padding:18px;
border-radius:12px;
margin-bottom:15px;
box-shadow:0 5px 15px rgba(0,0,0,0.06);
transition:0.3s;
animation:fade 0.5s ease;
}

.product:hover{
transform:translateY(-5px);
}

button{
background:#34495e;
color:white;
border:none;
padding:10px;
border-radius:8px;
width:100%;
cursor:pointer;
transition:0.3s;
}

button:hover{
background:#2c3e50;
}

/* INPUT */
input{
width:100%;
padding:8px;
margin:5px 0;
border-radius:8px;
border:1px solid #ddd;
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

<a href="/pelanggan/dashboard">Dashboard</a>
<a href="/pelanggan/product">Produk</a>
<a href="/logout">Logout</a>
</div>

<div class="content">

<h1>📦 Produk Camping</h1>

@foreach($products as $product)
<div class="product">

<h3>{{ $product->name }}</h3>
<p>Stok: {{ $product->stock }}</p>

<form action="{{ route('sewa.store') }}" method="POST">
@csrf

<input type="hidden" name="product_id" value="{{ $product->id }}">
<input type="hidden" name="customer_name" value="{{ $name }}">

<input type="date" name="rent_date" required>
<input type="date" name="return_date" required>
<input type="number" name="qty" value="1" min="1">

<button type="submit">Sewa Sekarang</button>

</form>

</div>
@endforeach

</div>

</body>
</html>