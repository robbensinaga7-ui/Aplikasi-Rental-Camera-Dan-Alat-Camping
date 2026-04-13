<h1>Data Category</h1>

<a href="/category/create">Tambah Category</a>

<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Aksi</th>
</tr>

@foreach($categories as $c)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $c->name }}</td>
    <td>
        <a href="/category/{{ $c->id }}/edit">Edit</a>

        <form action="/category/{{ $c->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </td>
</tr>
@endforeach

</table>