<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        return view('admin.product.create');
    }
    public function store(ProductRequest $request)
    {
        Product::create($request->validated());

        return redirect('/products');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.edit', compact('product'));
    }
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->validated());

        $product->save();

        return redirect('/products');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->back();
    }
}
