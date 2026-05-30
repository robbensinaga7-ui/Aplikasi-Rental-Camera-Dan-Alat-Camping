@extends('layouts.pelanggan')

@section('title','Profile Saya')

@section('content')

<div class="card">

    <h2 style="margin-bottom:20px;">
        👤 Profile Saya
    </h2>

    @if(session('success'))
        <div style="
            background:#d4edda;
            color:#155724;
            padding:12px;
            border-radius:10px;
            margin-bottom:15px;">
            {{ session('success') }}
        </div>
    @endif

    <!-- TAMPIL DATA -->
    <div id="profileView">

        <p><b>Nama :</b> {{ Auth::user()->name }}</p>
        <br>

        <p><b>Email :</b> {{ Auth::user()->email }}</p>
        <br>

        <p><b>No HP :</b> {{ Auth::user()->phone }}</p>
        <br>

        <p><b>Alamat :</b> {{ Auth::user()->address }}</p>

        <br>

        <button
            onclick="showEditForm()"
            style="
                background:#3498db;
                color:white;
                border:none;
                padding:12px 20px;
                border-radius:10px;
                cursor:pointer;">
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
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:10px;">
            </div>

            <div style="margin-bottom:15px;">
                <label>Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ Auth::user()->email }}"
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:10px;">
            </div>

            <div style="margin-bottom:15px;">
                <label>No HP</label>
                <input
                    type="text"
                    name="phone"
                    value="{{ Auth::user()->phone }}"
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:10px;">
            </div>

            <div style="margin-bottom:15px;">
                <label>Alamat</label>
                <textarea
                    name="address"
                    style="width:100%;padding:10px;border:1px solid #ddd;border-radius:10px;height:100px;">{{ Auth::user()->address }}</textarea>
            </div>

            <button
                type="submit"
                style="
                    background:#2ecc71;
                    color:white;
                    border:none;
                    padding:12px 20px;
                    border-radius:10px;
                    cursor:pointer;">
                💾 Update Profile
            </button>

            <button
                type="button"
                onclick="hideEditForm()"
                style="
                    background:#e74c3c;
                    color:white;
                    border:none;
                    padding:12px 20px;
                    border-radius:10px;
                    cursor:pointer;">
                ❌ Batal
            </button>

        </form>

    </div>

</div>

<script>
function showEditForm(){
    document.getElementById('profileView').style.display = 'none';
    document.getElementById('editForm').style.display = 'block';
}

function hideEditForm(){
    document.getElementById('profileView').style.display = 'block';
    document.getElementById('editForm').style.display = 'none';
}
</script>

@endsection