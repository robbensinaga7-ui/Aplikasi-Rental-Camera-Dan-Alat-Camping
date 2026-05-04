<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('pages.product', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }
    public function store(Request $request)
{
    $imagePath = null;

    // upload gambar
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }

    // kategori (selalu jalan)
    if ($request->category_name) {
        $category = Category::firstOrCreate([
            'name' => $request->category_name
        ]);
    } else {
        $category = Category::find($request->category_id);
    }

    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'image' => $imagePath,
        'stock' => $request->stock,
        'category_id' => $category->id
    ]);

    return redirect('/admin/product')->with('success', 'Produk berhasil ditambahkan');
}
public function edit(int $id)
{
    $product = Product::find($id);
    return view(' product.edit', compact('product'));
}
public function update(Request $request, int $id)
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
    return redirect('/admin/product');
}
}
