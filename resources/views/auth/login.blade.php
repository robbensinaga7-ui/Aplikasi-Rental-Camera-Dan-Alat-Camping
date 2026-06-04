<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login - Camping Rental</title>

<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

/* BODY */
body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    overflow:hidden;
    position:relative;

    background:url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1400&q=80');
    background-size:cover;
    background-position:center;
}

/* OVERLAY */
.overlay{
    position:absolute;
    inset:0;
    background:linear-gradient(
        135deg,
        rgba(0,0,0,0.65),
        rgba(0,0,0,0.45)
    );
    backdrop-filter:blur(4px);
}

/* ANIMATED CIRCLES */
.circle{
    position:absolute;
    border-radius:50%;
    background:rgba(255,255,255,0.08);
    animation:float 8s infinite ease-in-out;
}

.circle1{
    width:220px;
    height:220px;
    top:-50px;
    left:-70px;
}

.circle2{
    width:180px;
    height:180px;
    bottom:-40px;
    right:-40px;
    animation-delay:2s;
}

.circle3{
    width:120px;
    height:120px;
    top:20%;
    right:15%;
    animation-delay:4s;
}

/* LOGIN CARD */
.card{
    position:relative;
    z-index:2;

    width:380px;
    padding:35px;

    border-radius:24px;

    background:rgba(255,255,255,0.12);

    backdrop-filter:blur(16px);

    border:1px solid rgba(255,255,255,0.2);

    box-shadow:
        0 10px 30px rgba(0,0,0,0.25),
        inset 0 1px 1px rgba(255,255,255,0.2);

    animation:fadeUp 1s ease;
}

/* LOGO */
.logo{
    width:85px;
    height:85px;
    margin:auto;
    margin-bottom:18px;

    display:flex;
    justify-content:center;
    align-items:center;

    border-radius:50%;

    background:linear-gradient(135deg,#43e97b,#38f9d7);

    font-size:38px;

    box-shadow:0 10px 25px rgba(0,0,0,0.2);

    animation:pulse 3s infinite;
}

/* TITLE */
h2{
    text-align:center;
    color:white;
    font-size:30px;
    margin-bottom:8px;
    font-weight:700;
}

/* SUBTITLE */
.subtitle{
    text-align:center;
    color:rgba(255,255,255,0.8);
    font-size:14px;
    margin-bottom:28px;
}

/* ERROR */
.error{
    background:rgba(255,0,0,0.15);
    color:#fff;
    padding:12px;
    border-radius:12px;
    text-align:center;
    margin-bottom:18px;
    font-size:13px;
    border:1px solid rgba(255,255,255,0.2);
}

/* INPUT GROUP */
.input-group{
    margin-bottom:18px;
    position:relative;
}

/* INPUT */
.input-group input{
    width:100%;
    padding:14px 16px;

    border:none;
    outline:none;

    border-radius:14px;

    background:rgba(255,255,255,0.15);

    color:white;
    font-size:14px;

    border:1px solid transparent;

    transition:0.3s;
}

/* PLACEHOLDER */
.input-group input::placeholder{
    color:rgba(255,255,255,0.7);
}

/* FOCUS */
.input-group input:focus{
    border-color:#43e97b;
    background:rgba(255,255,255,0.2);

    box-shadow:0 0 0 4px rgba(67,233,123,0.15);
}

/* BUTTON */
.btn-login{
    width:100%;
    padding:14px;

    border:none;
    border-radius:14px;

    background:linear-gradient(135deg,#43e97b,#38f9d7);

    color:white;
    font-size:15px;
    font-weight:600;

    cursor:pointer;

    transition:0.4s;
}

/* BUTTON HOVER */
.btn-login:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 24px rgba(67,233,123,0.35);
}

/* FOOTER */
.footer{
    margin-top:20px;
    text-align:center;
    color:rgba(255,255,255,0.85);
    font-size:13px;
}

.footer a{
    color:#43e97b;
    text-decoration:none;
    font-weight:600;
}

.footer a:hover{
    text-decoration:underline;
}

/* ANIMATION */
@keyframes fadeUp{

from{
    opacity:0;
    transform:translateY(40px);
}

to{
    opacity:1;
    transform:translateY(0);
}

}

@keyframes float{

0%{
    transform:translateY(0px);
}

50%{
    transform:translateY(20px);
}

100%{
    transform:translateY(0px);
}

}

@keyframes pulse{

0%{
    transform:scale(1);
}

50%{
    transform:scale(1.08);
}

100%{
    transform:scale(1);
}

}

/* RESPONSIVE */
@media(max-width:480px){

.card{
    width:92%;
    padding:28px;
}

h2{
    font-size:24px;
}

}

</style>
</head>

<body>

<!-- OVERLAY -->
<div class="overlay"></div>

<!-- BACKGROUND ANIMATION -->
<div class="circle circle1"></div>
<div class="circle circle2"></div>
<div class="circle circle3"></div>

<!-- LOGIN CARD -->
<div class="card">

    <!-- LOGO -->
    <div class="logo">
        🏕️
    </div>

    <!-- TITLE -->
    <h2>Camping Rental</h2>

    <p class="subtitle">
        Login untuk memulai petualanganmu
    </p>

    <!-- ERROR -->
    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <!-- FORM -->
    <form method="POST" action="{{ route('login') }}">

        @csrf

        <!-- EMAIL -->
        <div class="input-group">
            <input
                type="email"
                name="email"
                placeholder="Masukkan Email"
                required>
        </div>

        <!-- PASSWORD -->
        <div class="input-group">
            <input
                type="password"
                name="password"
                placeholder="Masukkan Password"
                required>
        </div>

        <!-- BUTTON -->
        <button type="submit" class="btn-login">
            Login Sekarang
        </button>

    </form>

    <!-- FOOTER -->
    <div class="footer">
        Belum punya akun?
        <a href="/register">
            Daftar di sini
        </a>
    </div>

</div>

</body>
</html>