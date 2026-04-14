<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.wrapper {
    display: flex;
    min-height: 100vh;
}

.sidebar {
    width: 220px;
    background: linear-gradient(180deg,#0f2027,#203a43,#2c5364);
    color: white;
    padding: 20px;
    position: fixed;
    height: 100%;
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    color: white;
    text-decoration: none;
    padding: 12px;
    margin-bottom: 10px;
    border-radius: 10px;
}

.sidebar a:hover {
    background: rgba(255,255,255,0.2);
}

.content {
    margin-left: 220px;
    flex: 1;
    background: #f4f6f9;
    padding: 20px;
}

.header {
    background: white;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
}

.card {
    background: white;
    padding: 20px;
    border-radius: 12px;
}
</style>

</head>
<body>

<div class="wrapper">

    <div class="sidebar">
        <h2>🏕 Admin</h2>
        <a href="/admin">Dashboard</a>
        <a href="/product">Produk</a>
        <a href="/pengembalian">Pengembalian</a>
    </div>

    <div class="content">

        <div class="header">
            <h2>@yield('title')</h2>
        </div>

        @yield('content')

    </div>

</div>

</body>
</html>