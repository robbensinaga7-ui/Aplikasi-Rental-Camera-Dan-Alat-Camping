<h1>Edit Product</h1>

<form action="/product/{{ $product->id }}" method="POST">
@csrf
@method('PUT')

<input type="text" name="name" value="{{ $product->name }}"><br><br>
<textarea name="description">{{ $product->description }}</textarea><br><br>
<input type="number" name="price" value="{{ $product->price }}"><br><br>
<input type="text" name="image" value="{{ $product->image }}"><br><br>

<button type="submit">Update</button>

</form>