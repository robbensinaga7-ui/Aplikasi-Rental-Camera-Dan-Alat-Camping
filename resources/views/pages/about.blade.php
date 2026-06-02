@extends('layouts.app')

@section('title', 'About')

@section('content')

<style>

/* HERO */
.about-hero{
text-align:center;
padding:100px 20px;
background: linear-gradient(135deg,#56ccf2,#2f80ed);
color:white;
position:relative;
overflow:hidden;
border-bottom-left-radius:60px;
border-bottom-right-radius:60px;
}

/* bubble animation */
.about-hero::before{
content:"";
position:absolute;
width:300px;
height:300px;
background:rgba(255,255,255,0.1);
border-radius:50%;
top:-80px;
left:-80px;
animation:float 6s infinite ease-in-out;
}

.about-hero::after{
content:"";
position:absolute;
width:250px;
height:250px;
background:rgba(255,255,255,0.1);
border-radius:50%;
bottom:-80px;
right:-60px;
animation:float 8s infinite ease-in-out;
}

.about-hero h1{
font-size:56px;
margin-bottom:15px;
color:#fff8dc;
position:relative;
z-index:2;
animation:slideUp 1s ease;
}

.about-hero p{
font-size:18px;
opacity:0.95;
position:relative;
z-index:2;
animation:fadeIn 2s ease;
}

/* ABOUT CARD */
.about-container{
display:flex;
justify-content:center;
gap:30px;
flex-wrap:wrap;
padding:80px 20px;
background:#f8fbff;
}

.card{
background:white;
padding:30px;
border-radius:24px;
width:280px;
text-align:center;
box-shadow:0 10px 25px rgba(0,0,0,0.08);
transition:0.4s;
position:relative;
overflow:hidden;
}

/* glow effect */
.card::before{
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
transition:0.5s;
}

.card:hover::before{
left:100%;
}

.card:hover{
transform:translateY(-12px) scale(1.04);
box-shadow:0 20px 40px rgba(0,0,0,0.15);
}

.card h3{
font-size:24px;
margin-bottom:15px;
color:#2c3e50;
}

.card p{
color:#666;
line-height:1.6;
}

/* TEAM */
.team{
background:linear-gradient(135deg,#eef6ff,#ffffff);
padding:90px 20px;
text-align:center;
}

.team h2{
font-size:42px;
margin-bottom:50px;
color:#2c3e50;
}

/* TEAM BOX */
.team-box{
display:flex;
justify-content:center;
gap:30px;
flex-wrap:wrap;
}

/* MEMBER CARD */
.member{
background:white;
padding:25px;
border-radius:24px;
width:240px;
box-shadow:0 10px 25px rgba(0,0,0,0.08);
transition:0.4s;
position:relative;
overflow:hidden;
}

/* STATS */
.stats{
display:flex;
justify-content:center;
gap:25px;
flex-wrap:wrap;
padding:50px 20px;
background:#ffffff;
}

.stat-card{
background:white;
padding:25px;
width:220px;
text-align:center;
border-radius:25px;
box-shadow:0 10px 25px rgba(0,0,0,.08);
transition:.4s;
}

.stat-card:hover{
transform:translateY(-10px);
}

.stat-card h2{
font-size:36px;
color:#2f80ed;
margin-bottom:10px;
}

.stat-card p{
color:#666;
}

/* VISION */
.vision{
padding:80px 20px;
background:linear-gradient(135deg,#ffffff,#eef6ff);
text-align:center;
}

.vision h2{
font-size:40px;
margin-bottom:40px;
color:#2c3e50;
}

.vision-box{
display:flex;
justify-content:center;
gap:30px;
flex-wrap:wrap;
}

.vision-card{
background:white;
padding:30px;
width:320px;
border-radius:25px;
box-shadow:0 10px 25px rgba(0,0,0,.08);
transition:.4s;
}

.vision-card:hover{
transform:translateY(-10px);
}

.vision-card h3{
margin-bottom:15px;
color:#2f80ed;
}

/* WHY US */
.why-us{
padding:80px 20px;
background:#f8fbff;
text-align:center;
}

.why-us h2{
font-size:40px;
margin-bottom:40px;
color:#2c3e50;
}

.why-grid{
display:flex;
justify-content:center;
gap:25px;
flex-wrap:wrap;
}

.why-item{
background:white;
padding:25px;
width:260px;
border-radius:20px;
box-shadow:0 10px 25px rgba(0,0,0,.08);
transition:.4s;
}

.why-item:hover{
transform:translateY(-10px);
}

.why-item .icon{
font-size:45px;
margin-bottom:15px;
}
.vision-card p{
    color:#555;
    line-height:1.7;
    font-size:15px;
    margin-top:10px;
}

.why-item h3{
    color:#2c3e50;
    margin:15px 0 10px;
    font-size:20px;
}

.why-item p{
    color:#666;
    line-height:1.6;
}

.vision-card{
    min-height:220px;
}

.why-item{
    min-height:220px;
}
/* glow */
.member::before{
content:"";
position:absolute;
width:100%;
height:100%;
top:0;
left:-100%;
background:linear-gradient(
120deg,
transparent,
rgba(255,255,255,0.5),
transparent
);
transition:0.5s;
}

.member:hover::before{
left:100%;
}

.member:hover{
transform:translateY(-10px) scale(1.05);
box-shadow:0 20px 40px rgba(0,0,0,0.15);
}

/* IMAGE */
.member img{
width:100px;
height:100px;
border-radius:50%;
margin-bottom:15px;
border:5px solid #56ccf2;
transition:0.4s;
animation:float 4s ease-in-out infinite;
}

.member:hover img{
transform:scale(1.1) rotate(5deg);
}

/* TEXT */
.member h4{
margin-bottom:5px;
font-size:20px;
color:#2c3e50;
}

.member p{
color:#777;
font-size:14px;
}

/* ANIMATION */
@keyframes float{
0%{transform:translateY(0);}
50%{transform:translateY(-12px);}
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

<!-- HERO -->
<section class="about-hero" data-aos="fade-up">

<h1>Tentang Kami</h1>

<p>
Aplikasi rental modern untuk kebutuhan camping & petualangan Anda
</p>

</section>

<!-- CONTENT -->
<section class="about-container">

<div class="card" data-aos="fade-up" data-aos-delay="100">
<h3>🎯 Tujuan</h3>
<p>
Membantu pengelolaan rental agar lebih mudah, cepat, dan terorganisir.
</p>
</div>

<div class="card" data-aos="fade-up" data-aos-delay="200">
<h3>⚙️ Fitur</h3>
<p>
Manajemen barang, transaksi, dan perhitungan otomatis dalam satu sistem.
</p>
</div>

<div class="card" data-aos="fade-up" data-aos-delay="300">
<h3>🚀 Keunggulan</h3>
<p>
Desain modern, mudah digunakan, dan cocok untuk bisnis rental kecil maupun besar.
</p>
</div>

</section>
<!-- STATS -->
<section class="stats">

<div class="stat-card" data-aos="zoom-in">
<h2>100+</h2>
<p>Pelanggan</p>
</div>

<div class="stat-card" data-aos="zoom-in" data-aos-delay="100">
<h2>50+</h2>
<p>Produk Rental</p>
</div>

<div class="stat-card" data-aos="zoom-in" data-aos-delay="200">
<h2>24/7</h2>
<p>Layanan</p>
</div>

</section>

<!-- VISI MISI -->
<section class="vision">

<h2 data-aos="fade-up">
🎯 Visi & Misi
</h2>

<div class="vision-box">

<div class="vision-card" data-aos="fade-right">
<h3>🌟 Visi</h3>
<p>
Menjadi platform rental alat camping dan petualangan terbaik yang mudah diakses oleh semua orang.
</p>
</div>

<div class="vision-card" data-aos="fade-left">
<h3>🚀 Misi</h3>
<p>
Memberikan layanan rental yang cepat, aman, modern, dan terpercaya bagi seluruh pelanggan.
</p>
</div>

</div>

</section>

<!-- WHY US -->
<section class="why-us">

<h2 data-aos="fade-up">
🏕️ Mengapa Memilih Kami?
</h2>

<div class="why-grid">

<div class="why-item" data-aos="zoom-in">
<div class="icon">⚡</div>
<h3>Cepat</h3>
<p>Proses peminjaman lebih cepat dan mudah.</p>
</div>

<div class="why-item" data-aos="zoom-in" data-aos-delay="100">
<div class="icon">🔒</div>
<h3>Aman</h3>
<p>Data dan transaksi pelanggan terjamin aman.</p>
</div>

<div class="why-item" data-aos="zoom-in" data-aos-delay="200">
<div class="icon">🎒</div>
<h3>Lengkap</h3>
<p>Banyak pilihan alat camping dan petualangan.</p>
</div>

</div>

</section>

<!-- TEAM -->
<section class="team">

<h2 data-aos="fade-up">
👨‍💻 Developer Team
</h2>

<div class="team-box">

<div class="member" data-aos="zoom-in">
<img src="https://cdn-icons-png.flaticon.com/512/149/149071.png">

<h4>Robben Lamtipando Sinaga</h4>
<p></p>
</div>

<div class="member" data-aos="zoom-in" data-aos-delay="100">
<img src="https://cdn-icons-png.flaticon.com/512/149/149071.png">

<h4>Claudia M</h4>
<p></p>
</div>

<div class="member" data-aos="zoom-in" data-aos-delay="200">
<img src="https://cdn-icons-png.flaticon.com/512/149/149071.png">

<h4>John Feddly Nababan</h4>
<p></p>
</div>

</div>

</section>

@endsection