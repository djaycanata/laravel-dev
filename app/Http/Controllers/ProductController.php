<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view("products.index",compact("products"));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'productName' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stocks' => 'required|numeric',
        ]);

        Product::create([
            'productName' => $request->productName,
            'price' => $request->price,
            'stocks' => $request->stocks,
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }
}
