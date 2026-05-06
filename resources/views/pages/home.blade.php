@extends('layouts.app')

@section('title', 'Home')

@section('content')

<style>

/* HERO */
.hero{
display:flex;
align-items:center;
justify-content:space-between;
padding:100px 80px;
background: linear-gradient(135deg,#56ccf2,#2f80ed);
border-bottom-left-radius:60px;
border-bottom-right-radius:60px;
overflow:hidden;
position:relative;
}

/* animasi background bubble */
.hero::before{
content:"";
position:absolute;
width:400px;
height:400px;
background:rgba(255,255,255,0.1);
border-radius:50%;
top:-100px;
left:-100px;
animation:float 6s infinite ease-in-out;
}

.hero::after{
content:"";
position:absolute;
width:300px;
height:300px;
background:rgba(255,255,255,0.1);
border-radius:50%;
bottom:-80px;
right:-80px;
animation:float 8s infinite ease-in-out;
}

/* TEXT */
.hero-text{
max-width:500px;
z-index:2;
}

.hero-text h1{
font-size:54px;
margin-bottom:20px;
color:#fff8dc;
animation:slideUp 1s ease;
}

.hero-text p{
font-size:18px;
margin-bottom:30px;
opacity:0.9;
animation:fadeIn 2s ease;
}

/* BUTTON */
.btn{
background: linear-gradient(135deg,#ffd166,#ffb347);
color:#333;
padding:14px 30px;
border-radius:50px;
text-decoration:none;
font-weight:bold;
transition:0.3s;
display:inline-block;
box-shadow:0 10px 20px rgba(0,0,0,0.2);
}

.btn:hover{
transform:scale(1.1) rotate(-2deg);
box-shadow:0 15px 25px rgba(0,0,0,0.3);
}

/* IMAGE */
.hero-img img{
width:380px;
animation:float 4s ease-in-out infinite;
filter: drop-shadow(0 20px 25px rgba(0,0,0,0.4));
}

/* WHY */
.why{
background:#fff;
text-align:center;
padding:80px 20px;
}

.why h2{
font-size:36px;
margin-bottom:10px;
}

.subtitle{
color:#777;
margin-bottom:40px;
}

/* CARD */
.why-container{
display:flex;
justify-content:center;
gap:30px;
flex-wrap:wrap;
}

.why-item{
background:white;
padding:25px;
border-radius:20px;
width:250px;
box-shadow:0 10px 25px rgba(0,0,0,0.08);
transition:0.4s;
position:relative;
overflow:hidden;
}

/* glow effect */
.why-item::before{
content:"";
position:absolute;
width:100%;
height:100%;
top:0;
left:-100%;
background:linear-gradient(120deg,transparent,rgba(255,255,255,0.4),transparent);
transition:0.5s;
}

.why-item:hover::before{
left:100%;
}

.why-item:hover{
transform:translateY(-10px) scale(1.05);
box-shadow:0 20px 40px rgba(0,0,0,0.15);
}

/* ICON */
.icon{
font-size:40px;
margin-bottom:10px;
animation:bounce 2s infinite;
}

/* ANIMATIONS */
@keyframes slideUp{
from{opacity:0; transform:translateY(40px);}
to{opacity:1; transform:translateY(0);}
}

@keyframes fadeIn{
from{opacity:0;}
to{opacity:1;}
}

@keyframes float{
0%{transform:translateY(0);}
50%{transform:translateY(-20px);}
100%{transform:translateY(0);}
}

@keyframes bounce{
0%,100%{transform:translateY(0);}
50%{transform:translateY(-10px);}
}

</style>

<!-- HERO -->
<section class="hero">

<div class="hero-text" data-aos="fade-right">
<h1>Petualangan Dimulai dari Sini!</h1>

<p>Sewa peralatan camping berkualitas untuk petualangan Anda. Mudah, cepat, dan terpercaya!</p>

<a href="/pages/product" class="btn">Jelajahi Katalog</a>
</div>

<div class="hero-img" data-aos="fade-left">
<img src="https://cdn-icons-png.flaticon.com/512/201/201623.png">
</div>

</section>

<!-- WHY -->
<section class="why">

<h2 data-aos="fade-up">Mengapa Memilih Kami?</h2>
<p class="subtitle" data-aos="fade-up">Kami berkomitmen memberikan layanan terbaik untuk petualangan Anda</p>

<div class="why-container">

<div class="why-item" data-aos="zoom-in" data-aos-delay="100">
<div class="icon">✔️</div>
<h3>Kualitas Terjamin</h3>
<p>Semua peralatan dalam kondisi prima dan terawat</p>
</div>

<div class="why-item" data-aos="zoom-in" data-aos-delay="200">
<div class="icon">💰</div>
<h3>Harga Terjangkau</h3>
<p>Harga sewa fleksibel sesuai kebutuhan Anda</p>
</div>

<div class="why-item" data-aos="zoom-in" data-aos-delay="300">
<div class="icon">⚡</div>
<h3>Proses Cepat</h3>
<p>Booking mudah dan konfirmasi instan</p>
</div>

</div>

</section>

@endsection