<h2>Register - Rental Camera & Camping</h2>

<form method="POST" action="/register">
    @csrf
    <input type="text" name="name" placeholder="Nama"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button type="submit">Register</button>
</form>

<a href="/login">Sudah punya akun? Login</a>