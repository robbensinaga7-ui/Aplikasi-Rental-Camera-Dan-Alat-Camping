<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }
    public function create()
    {
    return view('product.create');
    }
    public function store(Request $request)
{
    $imagePath = null;
    
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }
    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'image' => $imagePath,
        'stock' => $request->stock
    ]);

    return redirect('/product')->with('success', 'Produk berhasil ditambahkan');;
}
public function edit($id)
{
    $product = Product::find($id);
    return view('product.edit', compact('product'));
}
public function update(Request $request, $id)
{
    $product = Product::find($id);
    if ($request->hasFile('image')) {
    $imagePath = $request->file('image')->store('products', 'public');
} else {
    $imagePath = $product->image;
}
    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'image' => $imagePath,
         'stock' => $request->stock
    ]);

    return redirect('/admin/product')->with('success', 'Product berhasil diupdate');
}
public function destroy($id)
{
    Product::destroy($id);
    return redirect('/product');
}
}
