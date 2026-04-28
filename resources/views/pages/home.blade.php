@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- HERO -->
<section class="hero">

<div class="hero-text" data-aos="fade-right">
<h1>Petualangan Dimulai dari Sini!</h1>

<p>Sewa peralatan camping berkualitas untuk petualangan Anda. Mudah, cepat, dan terpercaya!</p>

<a href="" class="btn">Jelajahi Katalog</a>
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

@endsection