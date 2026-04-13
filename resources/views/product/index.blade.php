<h1>Data Product</h1>

<a href="/product/create">Tambah Product</a>

<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Harga</th>
    <th>Gambar</th>
    <th>Aksi</th>
</tr>

@foreach($products as $p)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $p->name }}</td>
    <td>{{ $p->price }}</td>
    <td>
        <img src="{{ asset('storage/'.$p->image) }}" width="80">
    </td>
    <td>
        <a href="/product/{{ $p->id }}/edit">Edit</a>

        <form action="/product/{{ $p->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </td>
</tr>
@endforeach

</table>