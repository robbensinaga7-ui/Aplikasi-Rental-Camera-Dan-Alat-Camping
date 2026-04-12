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
</div>
</nav>

<!-- TITLE -->
<div class="title" data-aos="fade-up">
<h1>Katalog Produk</h1>
<p>Temukan peralatan camping terbaik untuk petualanganmu</p>
</div>

<!-- SEARCH -->
<div class="search-box" data-aos="fade-up">
<input type="text" id="searchInput" placeholder="Cari produk...">
</div>

<!-- PRODUCT LIST -->
<div class="product-container">

<!-- 1 -->
<div class="product-card product-item" data-name="tenda camping" data-aos="zoom-in">
<img src="https://images.unsplash.com/photo-1501555088652-021faa106b9b">
<div class="product-body">
<h3>Tenda Camping</h3>
<p>Tenda kuat untuk 4 orang</p>
<div class="price">Rp 500.000 / hari</div>
<a href="#" class="btn">Sewa</a>
</div>
</div>

<!-- 2 -->
<div class="product-card product-item" data-name="carrier gunung" data-aos="zoom-in" data-aos-delay="100">
<img src="https://images.unsplash.com/photo-1523413651479-597eb2da0ad6">
<div class="product-body">
<h3>Carrier Gunung</h3>
<p>Ransel kapasitas besar</p>
<div class="price">Rp 30.000 / hari</div>
<a href="#" class="btn">Sewa</a>
</div>
</div>

<!-- 3 -->
<div class="product-card product-item" data-name="kompor portable" data-aos="zoom-in" data-aos-delay="200">
<img src="https://images.unsplash.com/photo-1518837695005-2083093ee35b">
<div class="product-body">
<h3>Kompor Portable</h3>
<p>Masak di alam bebas</p>
<div class="price">Rp 20.000 / hari</div>
<a href="#" class="btn">Sewa</a>
</div>
</div>

<!-- 4 -->
<div class="product-card product-item" data-name="sleeping bag" data-aos="zoom-in" data-aos-delay="300">
<img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee">
<div class="product-body">
<h3>Sleeping Bag</h3>
<p>Hangat dan nyaman</p>
<div class="price">Rp 25.000 / hari</div>
<a href="#" class="btn">Sewa</a>
</div>
</div>

<div class="product-card product-item" data-name="sleeping bag" data-aos="zoom-in" data-aos-delay="300">
<img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee">
<div class="product-body">
<h3>Sepatu Mendaki</h3>
<p>Keamanan SElama Mendaki Gunung</p>
<div class="price">Rp 25.000 / hari</div>
<a href="#" class="btn">Sewa</a>
</div>
</div>

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