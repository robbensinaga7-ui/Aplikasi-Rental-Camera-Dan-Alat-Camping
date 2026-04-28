<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>@yield('title', 'Camping Rental')</title>

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

.catalog-search{
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
.footer {
    background: #0d0d0d;
    color: white;
    padding: 45px 20px;
    margin-top: 50px;
}

.footer-container {
    max-width: 1100px;
    margin: auto;
    
    display: flex;
    flex-wrap: wrap;            /* penting */
    justify-content: space-between;
    gap: 30px;                  /* kasih jarak */
}

.footer-container > div {
    flex: 1 1 200px;            /* biar responsif */
}

.footer h3 {
    margin-bottom: 10px;
}

.footer p {
    font-size: 14px;
    margin: 5px 0;
}

.footer a {
    color: #ccc;
    text-decoration: none;
}

.footer a:hover {
    color: #fff;
}

.footer-bottom {
    text-align: center;
    margin-top: 30px;
    border-top: 1px solid #333;
    padding-top: 15px;
    font-size: 13px;
}
/* ABOUT */
.about-hero{
text-align:center;
padding:80px 20px;
}

.about-hero h1{
font-size:48px;
margin-bottom:15px;
color:#fff8dc;
}

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
}

/* TEAM */
.team{
background:#ffe4c4;
color:#111;
text-align:center;
padding:70px 20px;
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
}

.member img{
width:80px;
border-radius:50%;
margin-bottom:10px;
}
/* PRODUCT */
.title{
text-align:center;
padding:60px 20px 10px;
}

.title h1{
font-size:42px;
color:#fff8dc;
}

.search-box{
display:flex;
justify-content:center;
margin:30px 0 50px;
}

.search-box input{
width:320px;
padding: 12px 20px;
border-radius:25px;
border:none;
font-size: 14px;
background: #f5f5f5;
color: #333;
}
.search-box input:focus{
    width: 380px;
    background: #ffffff;
}
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

.price{
font-weight:bold;
color:#ffd166;
}

.btn{
display:inline-block;
margin-top:10px;
padding:10px 18px;
border-radius:20px;
background:#ffd166;
color:#333;
text-decoration:none;
}
</style>

</head>

<body>

@include('components.header')

<main>
    @yield('content')
</main>

@include('components.footer')

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({
    duration: 1000,
    once: true
});
</script>

@yield('scripts')
</body>
</html>