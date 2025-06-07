<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class ProductController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price_200_gram' => 'required|numeric',
            'price_500_gram' => 'required|numeric',
            'description' => 'required',
            'buy_link_description' => 'required',
            'img' => 'required|image'
        ]);

        $path = $request->file('img')->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'price_200_gram' => $request->price_200_gram,
            'price_500_gram' => $request->price_500_gram,
            'description' => $request->description,
            'buy_link_description' => $request->buy_link_description,
            'img' => 'storage/' . $path
        ]);

        return redirect()->route('products.index');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price_200_gram' => 'required|numeric',
            'price_500_gram' => 'required|numeric',
            'description' => 'required',
            'buy_link_description' => 'required',
            'img' => 'nullable|image'
        ]);

        $data = $request->only([
            'name',
            'category',
            'price_200_gram',
            'price_500_gram',
            'description',
            'buy_link_description'
        ]);

        if ($request->hasFile('img')) {
            if ($product->img && Storage::disk('public')->exists(str_replace('storage/', '', $product->img))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $product->img));
            }
            $path = $request->file('img')->store('products', 'public');
            $data['img'] = 'storage/' . $path;
        }

        $product->update($data);

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->img && Storage::disk('public')->exists(str_replace('storage/', '', $product->img))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $product->img));
        }

        $product->delete();

        return redirect()->route('products.index');
    }
}
