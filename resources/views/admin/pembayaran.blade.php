<h2>Konfirmasi Pembayaran</h2>

<table border="1" cellpadding="10">
<tr>
<th>Produk</th>
<th>User</th>
<th>Bukti</th>
<th>Status</th>
<th>Aksi</th>
</tr>

@foreach($transactions as $t)
<tr>
<td>{{ $t->product->name }}</td>
<td>{{ $t->user->name ?? '-' }}</td>

<td>
@if($t->payment_proof)
    <img src="{{ asset('storage/'.$t->payment_proof) }}" width="100">
@endif
</td>

<td>{{ $t->payment_status }}</td>

<td>
@if($t->payment_status == 'pending')
    <form action="/admin/acc/{{ $t->id }}" method="POST" style="display:inline;">
        @csrf
        <button>ACC</button>
    </form>

    <form action="/admin/tolak/{{ $t->id }}" method="POST" style="display:inline;">
        @csrf
        <button>Tolak</button>
    </form>
@endif
</td>

</tr>
@endforeach
</table>