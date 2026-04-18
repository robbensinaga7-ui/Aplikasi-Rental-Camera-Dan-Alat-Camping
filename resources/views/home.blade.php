<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Camping Rental</title>

<!-- AOS Animation -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>

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
box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.logo{
font-size:26px;
font-weight:bold;
color:white;
}

.menu a{
color:white;
text-decoration:none;
margin-left:25px;
font-size:16px;
transition:0.3s;
}

.menu a:hover{
color:#ffd166;
}

/* HERO */

.hero{
display:flex;
align-items:center;
justify-content:space-between;
padding:100px 80px;
background: linear-gradient(135deg,#56ccf2,#2f80ed);
border-bottom-left-radius:50px;
border-bottom-right-radius:50px;
box-shadow: inset 0 -20px 50px rgba(0,0,0,0.1);
}

.hero-text{
max-width:500px;
animation: slideUp 1s ease;
}

.hero-text h1{
font-size:54px;
margin-bottom:20px;
line-height:1.2;
color:#fff8dc;
text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
}

.hero-text p{
font-size:18px;
margin-bottom:35px;
opacity:0.9;
color:#fefefe;
}

/* BUTTON */

.btn{
background: #ffd166;
color:#333;
padding:14px 30px;
border-radius:50px;
text-decoration:none;
font-weight:bold;
transition:0.3s;
box-shadow: 0 8px 15px rgba(0,0,0,0.2);
}

.btn:hover{
background:#ffda6a;
transform:scale(1.1) rotate(-2deg);
box-shadow: 0 12px 20px rgba(0,0,0,0.3);
cursor:pointer;
}

/* IMAGE */

.hero-img img{
width:380px;
filter: drop-shadow(0 20px 25px rgba(0,0,0,0.4));
animation: float 4s ease-in-out infinite;
border-radius:20px;
}


/* WHY SECTION */

.why{
background: #ffe4c4;
color:#111;
text-align:center;
padding:80px 20px;
}

.why h2{
font-size:36px;
margin-bottom:10px;
color:#333;
}

.subtitle{
color:#666;
margin-bottom:40px;
}

.why-container{
display:flex;
justify-content:center;
gap:40px;
flex-wrap:wrap;
}

.why-item{
max-width:250px;
background: #fff5e6;
padding:20px;
border-radius:20px;
transition:0.3s;
}

.why-item:hover{
transform: translateY(-10px);
box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}

.icon{
font-size:45px;
margin-bottom:15px;
color:#ff7f50;
}

/* CATALOG */

.catalog{
background:#f0f8ff;
color:#111;
text-align:center;
padding:80px 20px;
}

.catalog h2{
font-size:36px;
margin-bottom:10px;
color:#333;
}

.search-box{
display:flex;
justify-content:center;
gap:15px;
flex-wrap:wrap;
margin-top:30px;
background:#fff;
padding:20px;
border-radius:25px;
box-shadow:0 10px 25px rgba(0,0,0,0.1);
max-width:900px;
margin-left:auto;
margin-right:auto;
}

.search-box input,
.search-box select{
padding:12px;
border-radius:15px;
border:1px solid #ddd;
}

.search-box button{
background:#56ccf2;
color:white;
border:none;
padding:12px 25px;
border-radius:15px;
cursor:pointer;
transition:0.3s;
}

.search-box button:hover{
background:#2f80ed;
transform: scale(1.05);
}

/* ANIMATION */

@keyframes slideUp {
from {opacity: 0; transform: translateY(50px);}
to {opacity: 1; transform: translateY(0);}
}

@keyframes float {
0% { transform: translateY(0px); }
50% { transform: translateY(-20px); }
100% { transform: translateY(0px); }
}

</style>
</head>

<body>

<nav>
<div class="logo">🏕 Camping Rental</div>

<div class="menu">
<a href="/about">Tentang Kami</a>
<a href="/product">Product</a>
<a href="/login">Masuk</a>
<a href="/register">Daftar</a>
</div>
</nav>

<!-- HERO -->
<section class="hero">

<div class="hero-text" data-aos="fade-right">
<h1>Petualangan Dimulai dari Sini!</h1>

<p>Sewa peralatan camping berkualitas untuk petualangan Anda. Mudah, cepat, dan terpercaya!</p>

<a href="#" class="btn">Jelajahi Katalog</a>
</div>

<div class="hero-img" data-aos="fade-left">
<img src="https://cdn-icons-png.flaticon.com/512/201/201623.png">
</div>

</section>

<!-- WHY -->
<section class="why">

<h2>Mengapa Memilih Kami?</h2>
<p class="subtitle">Kami berkomitmen memberikan layanan terbaik untuk petualangan Anda</p>

<div class="why-container">
<div class="why-item" data-aos="fade-up" data-aos-delay="100">
<div class="icon">✔️</div>
<h3>Kualitas Terjamin</h3>
<p>Semua peralatan dalam kondisi prima dan terawat</p>
</div>

<div class="why-item" data-aos="fade-up" data-aos-delay="200">
<div class="icon">📁</div>
<h3>Harga Terjangkau</h3>
<p>Harga sewa fleksibel sesuai kebutuhan Anda</p>
</div>

<div class="why-item" data-aos="fade-up" data-aos-delay="300">
<div class="icon">⚡</div>
<h3>Proses Cepat</h3>
<p>Booking mudah dan konfirmasi instan</p>
</div>
</div>

</section>


</div>

</section>

<!-- AOS Script -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({
duration: 1000,
once: true
});
</script>
@include('layouts.footer')
</body>
</html>