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

        <div class="input-group">
            <input type="password"
                   name="password"
                   placeholder="Password Baru"
                   required>
        </div>

        <div class="input-group">
            <input type="password"
                   name="password_confirmation"
                   placeholder="Konfirmasi Password"
                   required>
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

</body>
</html>