<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Lupa Password - Camping Rental</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

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

    box-shadow:0 10px 25px rgba(0,0,0,.25);

    animation:pulse 2.5s infinite;
}

h2{
    text-align:center;
    color:white;
    margin-bottom:8px;
    animation:slideDown .8s ease;
}

.subtitle{
    text-align:center;
    color:rgba(255,255,255,0.8);
    font-size:14px;
    margin-bottom:25px;
}

.input-group{
    margin-bottom:18px;
}

.input-group input{
    width:100%;
    padding:14px 16px;
    border:none;
    outline:none;
    border-radius:14px;
    background:rgba(255,255,255,0.15);
    color:white;
    transition:.3s;
}

.input-group input:focus{
    background:rgba(255,255,255,0.25);
    box-shadow:0 0 0 4px rgba(67,233,123,.2);
    transform:translateY(-2px);
}

.input-group input::placeholder{
    color:rgba(255,255,255,0.7);
}

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
    transition:.4s;
}

.btn-login:hover{
    transform:translateY(-4px);
    box-shadow:0 15px 25px rgba(67,233,123,.35);
}

.btn-login:active{
    transform:scale(.98);
}

.footer{
    margin-top:20px;
    text-align:center;
    color:white;
}

.footer a{
    color:#43e97b;
    text-decoration:none;
}

@keyframes float{
0%{transform:translateY(0);}
50%{transform:translateY(20px);}
100%{transform:translateY(0);}
}
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

@keyframes slideDown{
    from{
        opacity:0;
        transform:translateY(-20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
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

@keyframes float{
    0%{
        transform:translateY(0);
    }
    50%{
        transform:translateY(20px);
    }
    100%{
        transform:translateY(0);
    }
}
.slash{
    position:absolute;
    top:50%;
    left:50%;
    width:22px;
    height:2px;
    background:white;

    transform:translate(-50%, -50%) rotate(45deg) scaleX(0);
    transform-origin:center;

    transition:0.3s ease;
    opacity:0;
}

.toggle-password.active .slash{
    transform:translate(-50%, -50%) rotate(45deg) scaleX(1);
    opacity:1;
}
.password-group{
    position:relative;
}

.toggle-password{
    position:absolute;
    right:15px;
    top:50%;
    transform:translateY(-50%);
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:center;
}
</style>
</head>

<body>

<div class="overlay"></div>

<div class="circle circle1"></div>
<div class="circle circle2"></div>
<div class="circle circle3"></div>

<div class="card">

    <div class="logo">🔑</div>

    <h2>Lupa Password</h2>

    <p class="subtitle">
        Masukkan email dan password baru
    </p>

    <form action="{{ route('reset.password') }}" method="POST">
        @csrf

        <div class="input-group">
            <input type="email"
                   name="email"
                   placeholder="Masukkan Email"
                   required>
        </div>

       <div class="input-group password-group">
    <input type="password" name="password" placeholder="Password Baru" required>

    <span class="toggle-password" onclick="togglePassword(this)">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="white">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5
                   c4.478 0 8.268 2.943 9.542 7
                   -1.274 4.057-5.064 7-9.542 7
                   -4.477 0-8.268-2.943-9.542-7z"/>
        </svg>

        <span class="slash"></span>
    </span>
</div>

       <div class="input-group password-group">
    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

    <span class="toggle-password" onclick="togglePassword(this)">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="white">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5
                   c4.478 0 8.268 2.943 9.542 7
                   -1.274 4.057-5.064 7-9.542 7
                   -4.477 0-8.268-2.943-9.542-7z"/>
        </svg>

        <span class="slash"></span>
    </span>
</div>

        <button type="submit" class="btn-login">
            Ganti Password
        </button>
    </form>

    <div class="footer">
        <a href="{{ route('login') }}">
            ← Kembali ke Login
        </a>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('error'))
<script>
Swal.fire({
    icon:'error',
    title:'Gagal',
    text:'{{ session("error") }}'
});
</script>
@endif

@if(session('success'))
<script>
Swal.fire({
    icon:'success',
    title:'Berhasil',
    text:'{{ session("success") }}'
});
</script>
@endif
<script>
function togglePassword(el) {
    const input = el.parentElement.querySelector("input");

    if (input.type === "password") {
        input.type = "text";
        el.classList.add("active");
    } else {
        input.type = "password";
        el.classList.remove("active");
    }
}
</script>
</body>
</html>