<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ListProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('product.list', compact('products'));
    }

        /**
     * Display products by category: satuan
     */
    public function satuan()
    {
        $products = Product::where('category', 'satuan')
                          ->orderBy('name', 'asc')
                          ->get();

        return view('product.satuan', compact('products'));
    }

    /**
     * Display products by category: paket
     */
    public function paketan()
    {
        $products = Product::where('category', 'paketan')
                          ->orderBy('name', 'asc')
                          ->get();

        return view('product.paketan', compact('products'));
    }

    /**
     * Display a specific product
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }
}
