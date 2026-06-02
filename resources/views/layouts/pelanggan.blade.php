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

body{
    background:#f1f5f9;
    min-height:100vh;
}

/* DEKORASI */
.bg-decoration{
    position:fixed;
    width:400px;
    height:400px;
    border-radius:50%;
    background:rgba(79,172,254,.08);
    top:-150px;
    right:-100px;
    z-index:-1;
}

.bg-decoration2{
    position:fixed;
    width:300px;
    height:300px;
    border-radius:50%;
    background:rgba(168,85,247,.06);
    bottom:-100px;
    left:-100px;
    z-index:-1;
}
/* WRAPPER */
.wrapper{
    display:flex;
    min-height:100vh;
}

/* SIDEBAR */
.sidebar{
    width:260px;
    background:linear-gradient(
        180deg,
        #0f172a,
        #1e293b,
        #334155
    );
    padding:20px;
    position:fixed;
    top:0;
    left:-260px;
    bottom:0;
    overflow-y:auto;
    box-shadow:5px 0 25px rgba(0,0,0,.25);
    transition:.4s ease;
    z-index:1000;
}

.sidebar.show{
    left:0;
}

.sidebar h2{
    color:white;
    text-align:center;
    margin-bottom:35px;
    font-size:28px;
    font-weight:700;
}

.sidebar a{
    display:flex;
    align-items:center;
    gap:10px;
    text-decoration:none;
    color:white;
    padding:14px 16px;
    border-radius:14px;
    margin-bottom:10px;
    transition:.3s;
}

.sidebar a:hover,
.sidebar a.active{
    background:rgba(255,255,255,.15);
    transform:translateX(6px);
}

.content{
    width:100%;
    padding:30px;
}

.page-title{
    font-size:30px;
    font-weight:700;
    color:white;
    margin-bottom:20px;
}

.card{
    background:rgba(255,255,255,.95);
    backdrop-filter:blur(10px);
    border-radius:22px;
    padding:22px;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
    margin-bottom:20px;
}

.table-box{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
    border-radius:15px;
    overflow:hidden;
}

th{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    color:white;
    padding:14px;
    font-size:14px;
}

td{
    padding:14px;
    text-align:center;
    border-bottom:1px solid #eee;
}

tr:hover{
    background:#f5faff;
}

.btn{
    border:none;
    padding:10px 16px;
    border-radius:10px;
    color:white;
    cursor:pointer;
    transition:.3s;
    text-decoration:none;
    display:inline-block;
}

.btn:hover{
    transform:scale(1.05);
}

.btn-primary{
    background:#3498db;
}

.btn-success{
    background:#2ecc71;
}

.btn-danger{
    background:#e74c3c;
}

.btn-warning{
    background:#f39c12;
}

.badge{
    padding:6px 12px;
    border-radius:20px;
    font-size:12px;
    color:white;
}

.badge-primary{background:#3498db;}
.badge-success{background:#2ecc71;}
.badge-danger{background:#e74c3c;}
.badge-warning{background:#f39c12;}

.table-img{
    width:75px;
    border-radius:12px;
    transition:.3s;
}

.table-img:hover{
    transform:scale(1.1);
}

/* SCROLLBAR */
::-webkit-scrollbar{
    width:8px;
}

::-webkit-scrollbar-thumb{
    background:#4facfe;
    border-radius:20px;
}
.menu-toggle{
    position:fixed;
    top:15px;
    left:15px;
    width:50px;
    height:50px;
    border:none;
    border-radius:12px;
    background:#0f172a;
    color:white;
    font-size:24px;
    cursor:pointer;
    z-index:1100;
    box-shadow:0 5px 15px rgba(0,0,0,.2);
}
/* RESPONSIVE */
@media(max-width:900px){

.sidebar{
    width:260px;
}

.content{
    margin-left:0;
}

}

</style>

@yield('style')

</head>
<body>

<button class="menu-toggle" onclick="toggleSidebar()">
☰
</button>

<div class="bg-decoration"></div>
<div class="bg-decoration2"></div>

<div class="wrapper">

    <div class="sidebar">

       <h2>🏕 Pelanggan</h2>

<a href="/pelanggan/dashboard"
   class="{{ request()->is('pelanggan/dashboard') ? 'active' : '' }}">
   🏠 Dashboard
</a>

<a href="/pelanggan/product"
   class="{{ request()->is('pelanggan/product*') ? 'active' : '' }}">
   📦 Produk
</a>

<a href="/pelanggan/profile">
   👤 Profil
</a>

<a href="/logout"
   class="btn btn-danger"
   style="margin-top:20px;text-align:center;width:100%;">
   🚪 Logout
</a>

    </div>

    <div class="content">
        @yield('content')
    </div>

</div>

@yield('script')
<script>
function toggleSidebar(){
    document.querySelector('.sidebar')
    .classList.toggle('show');
}
</script>
</body>
</html>