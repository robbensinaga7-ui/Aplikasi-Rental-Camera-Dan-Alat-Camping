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
        return view('pages.product.create', compact('categories'));
    }
    public function store(Request $request)
{
    $imagePath = null;
    
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $category = Category::firstOrCreate([
        'name' => $request->category_name
    ]);
    }
    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'image' => $imagePath,
        'stock' => $request->stock,
        'category_id' => $request->category_id
    ]);

    return redirect('/product')->with('success', 'Produk berhasil ditambahkan');;
}
public function edit($id)
{
    $product = Product::find($id);
    return view('pages.product.edit', compact('product'));
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
