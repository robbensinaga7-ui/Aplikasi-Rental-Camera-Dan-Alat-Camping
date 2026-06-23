@extends('layouts.admin')

@section('title','Tambah Pelanggan')

@section('content')

<style>

body{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    min-height:100vh;
}

/* Hiasan bulat */
body::before,
body::after{
    content:"";
    position:absolute;
    border-radius:50%;
    opacity:.2;
}

body::before{
    width:200px;
    height:200px;
    background:white;
    top:50px;
    left:50px;
}

body::after{
    width:300px;
    height:300px;
    background:white;
    bottom:50px;
    right:50px;
}

/* Container */
.form-container{
    max-width:700px;
    margin:auto;
    padding-top:40px;
    animation:fadeIn 1s ease;
}

/* Card */
.form-card{
    background:rgba(255,255,255,0.9);
    backdrop-filter:blur(10px);
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,0.15);
    transform:translateY(30px);
    animation:slideUp 0.8s ease forwards;
}

/* Header */
.form-header{
    background:linear-gradient(135deg,#4facfe,#00c6ff);
    color:white;
    text-align:center;
    padding:30px;
}

.form-header h2{
    margin-bottom:8px;
}

/* Icon animasi */
.icon-box{
    font-size:60px;
    margin-bottom:10px;
    animation:float 3s infinite ease-in-out;
}

/* Body */
.form-body{
    padding:30px;
}

/* Floating label */
.form-group{
    position:relative;
    margin-bottom:22px;
}

.form-group input,
.form-group textarea{
    width:100%;
    padding:14px;
    border:1px solid #dbe2ea;
    border-radius:12px;
    outline:none;
    transition:.3s;
}

.form-group label{
    position:absolute;
    top:12px;
    left:15px;
    color:#888;
    background:white;
    padding:0 5px;
    transition:.3s;
    pointer-events:none;
}

.form-group input:focus,
.form-group textarea:focus{
    border-color:#3498db;
    box-shadow:0 0 0 4px rgba(52,152,219,0.15);
}

.form-group input:focus + label,
.form-group textarea:focus + label,
.form-group input:not(:placeholder-shown) + label,
.form-group textarea:not(:placeholder-shown) + label{
    top:-10px;
    font-size:12px;
    color:#3498db;
}

/* Button */
.btn-save{
    background:linear-gradient(135deg,#2ecc71,#27ae60);
    color:white;
    border:none;
    padding:12px 25px;
    border-radius:12px;
    cursor:pointer;
    font-weight:600;
    transition:.3s;
}

.btn-save:hover{
    transform:scale(1.05);
    box-shadow:0 8px 20px rgba(46,204,113,0.4);
}

.btn-back{
    background:linear-gradient(135deg,#e74c3c,#ff6b6b);
    color:white;
    text-decoration:none;
    padding:12px 25px;
    border-radius:12px;
    margin-left:10px;
    font-weight:600;
    transition:.3s;
}

.btn-back:hover{
    transform:scale(1.05);
    box-shadow:0 8px 20px rgba(231,76,60,0.4);
}

/* Animations */
@keyframes fadeIn{
    from{opacity:0;}
    to{opacity:1;}
}

@keyframes slideUp{
    to{
        transform:translateY(0);
        opacity:1;
    }
}

@keyframes float{
    0%,100%{transform:translateY(0);}
    50%{transform:translateY(-10px);}
}

</style>

<div class="form-container">

    <div class="form-card">

        <div class="form-header">
            <div class="icon-box">👤</div>
            <h2>Tambah Data Pelanggan</h2>
            <p>Isi data pelanggan dengan lengkap</p>
        </div>

        <div class="form-body">

            <form action="/admin/pelanggan/store" method="POST">
                @csrf

                <div class="form-group">
                    <input type="text" name="name" placeholder=" " required>
                    <label>Nama Lengkap</label>
                </div>

                <div class="form-group">
                    <input type="email" name="email" placeholder=" " required>
                    <label>Email</label>
                </div>

                <div class="form-group">
                    <input type="text" name="phone" placeholder=" ">
                    <label>No HP</label>
                </div>

                <div class="form-group">
                    <textarea name="address" rows="4" placeholder=" "></textarea>
                    <label>Alamat</label>
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder=" " required>
                    <label>Password</label>
                </div>

                <button type="submit" class="btn-save">💾 Simpan</button>
                <a href="/admin/pelanggan" class="btn-back">↩ Kembali</a>

            </form>

        </div>

    </div>

</div>

@endsection