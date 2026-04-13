<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register - Camping Rental</title>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;

    /* background camping vibe */
    background: url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1400&q=80');
    background-size: cover;
    background-position: center;
}

/* overlay gelap */
.overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
}

/* card */
.card {
    position: relative;
    z-index: 2;
    background: rgba(255,255,255,0.95);
    padding: 30px;
    border-radius: 16px;
    width: 340px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.3);
    animation: fadeIn 0.8s ease;
}

/* animasi */
@keyframes fadeIn {
    from {opacity: 0; transform: translateY(20px);}
    to {opacity: 1; transform: translateY(0);}
}

h2 {
    text-align: center;
    margin-bottom: 5px;
    color: #2f4f2f;
}

p {
    text-align: center;
    font-size: 12px;
    margin-bottom: 20px;
    color: #666;
}

input {
    width: 100%;
    padding: 11px;
    margin: 8px 0;
    border: 1px solid #ddd;
    border-radius: 10px;
    outline: none;
    transition: 0.3s;
}

input:focus {
    border-color: #2e7d32;
    box-shadow: 0 0 5px rgba(46,125,50,0.4);
}

button {
    width: 100%;
    padding: 12px;
    margin-top: 10px;
    background: #2e7d32;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-weight: 600;
    transition: 0.3s;
}

button:hover {
    background: #1b5e20;
    transform: scale(1.03);
}

.success {
    color: green;
    text-align: center;
    margin-bottom: 10px;
    font-size: 13px;
}

.footer {
    text-align: center;
    margin-top: 10px;
    font-size: 12px;
    color: #444;
}
</style>
</head>

<body>

<div class="overlay"></div>

<div class="card">
    <h2>🌲 Camping Rental</h2>
    <p>Buat akun untuk mulai sewa alat camping</p>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="/register">
        @csrf

        <input type="text" name="name" placeholder="Nama Lengkap">
    <input type="email" name="email" placeholder="Email Aktif">

    <!-- tambahan baru -->
    <input type="text" name="phone" placeholder="Nomor HP">
    <input type="text" name="address" placeholder="Alamat Lengkap">

    <input type="password" name="password" placeholder="Password">


        <button type="submit">Daftar Sekarang</button>
    </form>

    <div class="footer">
        Sudah punya akun? Login aja dulu
    </div>
</div>

</body>
</html>