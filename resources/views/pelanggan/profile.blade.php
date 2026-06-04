@extends('layouts.pelanggan')

@section('title','Profile Saya')
@section('style')
<style>

.profile-card{
    max-width:750px;
    margin:auto;
    background:white;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,0.08);
}

.profile-header{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    padding:40px;
    text-align:center;
    color:white;
}

.profile-avatar{
    width:100px;
    height:100px;
    border-radius:50%;
    background:white;
    color:#3498db;
    font-size:40px;
    font-weight:bold;
    display:flex;
    justify-content:center;
    align-items:center;
    margin:auto;
    margin-bottom:15px;
}

.profile-body{
    padding:30px;
}

.profile-item{
    background:#f8fbff;
    padding:15px;
    border-radius:15px;
    margin-bottom:15px;
}

.profile-item label{
    display:block;
    font-size:13px;
    color:#64748b;
    margin-bottom:5px;
}

.profile-item p{
    color:#1e293b;
    font-weight:600;
}

.form-control{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:12px;
    outline:none;
    transition:.3s;
}

.form-control:focus{
    border-color:#3498db;
    box-shadow:0 0 10px rgba(52,152,219,.2);
}

.btn-edit{
    background:linear-gradient(135deg,#3498db,#6c9cff);
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:12px;
    cursor:pointer;
}

.btn-save{
    background:linear-gradient(135deg,#2ecc71,#27ae60);
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:12px;
    cursor:pointer;
}

.btn-cancel{
    background:linear-gradient(135deg,#e74c3c,#c0392b);
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:12px;
    cursor:pointer;
    margin-left:10px;
}

.success-box{
    background:#d4edda;
    color:#155724;
    padding:12px;
    border-radius:12px;
    margin-bottom:15px;
}

</style>
@endsection

@section('content')

<div class="profile-card">

    <div class="profile-header">

        <div class="profile-avatar">
            {{ strtoupper(substr(Auth::user()->name,0,1)) }}
        </div>

        <h2>{{ Auth::user()->name }}</h2>

        <p>{{ Auth::user()->email }}</p>

    </div>

    <div class="profile-body">

        @if(session('success'))
            <div class="success-box">
                {{ session('success') }}
            </div>
        @endif

        <!-- TAMPIL DATA -->
        <div id="profileView">

            <div class="profile-item">
                <label>Nama</label>
                <p>{{ Auth::user()->name }}</p>
            </div>

            <div class="profile-item">
                <label>Email</label>
                <p>{{ Auth::user()->email }}</p>
            </div>

            <div class="profile-item">
                <label>No HP</label>
                <p>{{ Auth::user()->phone }}</p>
            </div>

            <div class="profile-item">
                <label>Alamat</label>
                <p>{{ Auth::user()->address }}</p>
            </div>

            <button onclick="showEditForm()" class="btn-edit">
                ✏️ Edit Profile
            </button>

        </div>

        <!-- FORM EDIT -->
        <div id="editForm" style="display:none;">

            <form action="/pelanggan/profile/update" method="POST">

                @csrf

                <div style="margin-bottom:15px;">
                    <label>Nama</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ Auth::user()->name }}"
                        class="form-control">
                </div>

                <div style="margin-bottom:15px;">
                    <label>Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ Auth::user()->email }}"
                        class="form-control">
                </div>

                <div style="margin-bottom:15px;">
                    <label>No HP</label>
                    <input
                        type="text"
                        name="phone"
                        value="{{ Auth::user()->phone }}"
                        class="form-control">
                </div>

                <div style="margin-bottom:15px;">
                    <label>Alamat</label>
                    <textarea
                        name="address"
                        class="form-control"
                        style="height:100px;">{{ Auth::user()->address }}</textarea>
                </div>

                <button type="submit" class="btn-save">
                    💾 Update Profile
                </button>

                <button type="button" onclick="hideEditForm()" class="btn-cancel">
                    ❌ Batal
                </button>

            </form>

        </div>

    </div>

</div>

<script>

function showEditForm(){
    document.getElementById('profileView').style.display='none';
    document.getElementById('editForm').style.display='block';
}

function hideEditForm(){
    document.getElementById('profileView').style.display='block';
    document.getElementById('editForm').style.display='none';
}

</script>


</div>

@endsection