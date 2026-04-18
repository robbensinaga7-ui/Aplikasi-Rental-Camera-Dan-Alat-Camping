<h1>Dashboard Pelanggan</h1>

<!-- FORM CEK NAMA PELANGGAN -->
<form method="GET" action="{{ route('pelanggan.dashboard') }}">
    <input type="text" name="customer_name" placeholder="Masukkan nama kamu" value="{{ $name }}">
    <button type="submit">Lihat Dashboard</button>
</form>

<hr>

<h2>Produk Tersedia</h2>

@foreach($products as $product)
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <p><b>{{ $product->name ?? 'Nama Produk' }}</b></p>
        <p>Stok: {{ $product->stock }}</p>

        <!-- FORM SEWA -->
        <form action="{{ route('sewa.store') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="customer_name" value="{{ $name }}">

            <input type="date" name="rent_date" required>
            <input type="date" name="return_date" required>

            <input type="number" name="qty" value="1" min="1">

            <button type="submit">Sewa</button>
        </form>
    </div>
@endforeach

<hr>

<h2>Riwayat Peminjaman</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Produk</th>
        <th>Qty</th>
        <th>Tanggal Sewa</th>
        <th>Kembali</th>
        <th>Status</th>
    </tr>

    @foreach($transactions as $t)
    <tr>
        <td>{{ $t->product->name ?? '-' }}</td>
        <td>{{ $t->qty }}</td>
        <td>{{ $t->rent_date }}</td>
        <td>{{ $t->return_date }}</td>
        <td>{{ $t->status }}</td>
    </tr>
    @endforeach
</table>