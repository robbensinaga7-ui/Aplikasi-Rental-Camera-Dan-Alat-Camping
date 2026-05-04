<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login - Camping Rental</title>

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

    background: url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1400&q=80');
    background-size: cover;
    background-position: center;
}

/* overlay */
.overlay {
    position: absolute;
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
    animation: slideUp 0.8s ease;
}

/* animasi */
@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
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

/* tombol */
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

/* error */
.error {
    color: red;
    text-align: center;
    margin-bottom: 10px;
    font-size: 13px;
}

/* footer */
.footer {
    text-align: center;
    margin-top: 12px;
    font-size: 12px;
    color: #444;
}

.footer a {
    color: #2e7d32;
    text-decoration: none;
    font-weight: 500;
}
</style>
</head>

<body>

<div class="overlay"></div>

<div class="card">
    <h2>🌲 Camping Rental</h2>
    <p>Login untuk mulai petualanganmu</p>

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">

        <button type="submit">Login Sekarang</button>
    </form>

    <div class="footer">
        Belum punya akun? <a href="/register">Daftar di sini</a>
    </div>
</div>

</body>
</html>