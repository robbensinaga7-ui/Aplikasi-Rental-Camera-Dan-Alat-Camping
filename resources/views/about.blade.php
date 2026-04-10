<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About - Camping Rental</title>

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

/* NAVBAR (SAMA) */
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

/* HERO ABOUT */
.about-hero{
text-align:center;
padding:80px 20px;
}

.about-hero h1{
font-size:48px;
margin-bottom:15px;
color:#fff8dc;
}

.about-hero p{
opacity:0.9;
}

/* CONTENT */
.about-container{
display:flex;
justify-content:center;
gap:30px;
flex-wrap:wrap;
padding:50px 20px;
}

.card{
background: rgba(255,255,255,0.15);
padding:30px;
border-radius:20px;
width:280px;
backdrop-filter: blur(10px);
transition:0.4s;
}

.card:hover{
transform: translateY(-10px);
background: rgba(255,255,255,0.3);
}

.card h3{
margin-bottom:10px;
}

.card p{
font-size:14px;
opacity:0.9;
}

/* TEAM */
.team{
background:#ffe4c4;
color:#111;
text-align:center;
padding:70px 20px;
}

.team h2{
margin-bottom:20px;
}

.team-box{
display:flex;
justify-content:center;
gap:30px;
flex-wrap:wrap;
}

.member{
background:#fff;
padding:20px;
border-radius:20px;
width:200px;
transition:0.3s;
}

.member:hover{
transform: scale(1.05);
}

.member img{
width:80px;
border-radius:50%;
margin-bottom:10px;
}

</style>
</head>

<body>

<nav>
<div class="logo">🏕 Camping Rental</div>

<div class="menu">
<a href="/home">Home</a>
<a href="/product">Product</a>
<a href="">Daftar</a>
<a href="#">Login</a>
</div>
</nav>

<!-- HERO -->
<section class="about-hero" data-aos="fade-up">
<h1>Tentang Kami</h1>
<p>Aplikasi rental modern untuk kebutuhan camping & petualangan Anda</p>
</section>

<!-- CONTENT -->
<section class="about-container">

<div class="card" data-aos="fade-up" data-aos-delay="100">
<h3>🎯 Tujuan</h3>
<p>Membantu pengelolaan rental agar lebih mudah, cepat, dan terorganisir.</p>
</div>

<div class="card" data-aos="fade-up" data-aos-delay="200">
<h3>⚙️ Fitur</h3>
<p>Manajemen barang, transaksi, dan perhitungan otomatis dalam satu sistem.</p>
</div>

<div class="card" data-aos="fade-up" data-aos-delay="300">
<h3>🚀 Keunggulan</h3>
<p>Desain modern, mudah digunakan, dan cocok untuk bisnis rental kecil maupun besar.</p>
</div>

</section>

<!-- TEAM -->
<section class="team">

<h2 data-aos="fade-up">Developer</h2>

<div class="team-box">

<div class="member" data-aos="zoom-in">
<img src="https://cdn-icons-png.flaticon.com/512/149/149071.png">
<h4>Mahasiswa IT</h4>
<p>Developer</p>
</div>

</div>

</section>

<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({
duration:1000,
once:true
});
</script>

</body>
</html>