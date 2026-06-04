<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>@yield('title')</title>

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
    display:flex;
    min-height:100vh;
    background:linear-gradient(135deg,#f6f9fc,#eef3f8);
}

/* SIDEBAR */
.sidebar{
    width:260px;
    background:linear-gradient(180deg,#1e293b,#334155);
    color:white;
    padding:25px 20px;
    position:fixed;
    height:100%;
    overflow-y:auto;
}

/* LOGO */
.logo{
    text-align:center;
    margin-bottom:35px;
}

.logo h2{
    font-size:24px;
    font-weight:700;
}

/* MENU */
.sidebar a{
    display:flex;
    align-items:center;
    gap:12px;
    text-decoration:none;
    color:white;
    padding:13px 15px;
    border-radius:12px;
    margin-bottom:10px;
    transition:0.3s;
    font-size:15px;
    font-weight:500;
}

/* ACTIVE */
.sidebar a:hover,
.sidebar a.active{
    background:rgba(255,255,255,0.12);
    transform:translateX(5px);
}

/* LOGOUT */
.logout{
    margin-top:30px;
    background:linear-gradient(135deg,#ff6b6b,#ff758c);
    justify-content:center;
}

/* CONTENT */
.content{
    flex:1;
    margin-left:260px;
    padding:30px;
}

/* GLOBAL CARD */
.card{
    background:white;
    border-radius:20px;
    padding:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
    margin-bottom:20px;
}

/* GLOBAL TABLE */
table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:linear-gradient(135deg,#1e293b,#334155);
    color:white;
    padding:14px;
}

td{
    padding:14px;
    border-bottom:1px solid #eee;
    text-align:center;
}

tr:hover{
    background:#f8fbff;
}

/* BUTTON */
.btn{
    border:none;
    padding:9px 14px;
    border-radius:10px;
    cursor:pointer;
    color:white;
    transition:0.3s;
}

.btn:hover{
    transform:translateY(-2px);
    opacity:0.95;
}

/* BADGE */
.badge{
    padding:6px 14px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
}

/* RESPONSIVE */
@media(max-width:768px){

.sidebar{
    width:100%;
    height:auto;
    position:relative;
}

.content{
    margin-left:0;
    padding:20px;
}

body{
    flex-direction:column;
}

}

</style>

@yield('style')

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="logo">
        <h2>🏕 Rental</h2>
    </div>

    <a href="/pelanggan/dashboard"
       class="{{ request()->is('pelanggan/dashboard') ? 'active' : '' }}">
        🏠 Dashboard
    </a>

    <a href="/pelanggan/product"
       class="{{ request()->is('pelanggan/product*') ? 'active' : '' }}">
        📦 Produk
    </a>

    <a href="/logout" class="logout">
        🚪 Keluar
    </a>

</div>

<!-- CONTENT -->
<div class="content">

    @yield('content')

</div>

@yield('script')

</body>
</html>