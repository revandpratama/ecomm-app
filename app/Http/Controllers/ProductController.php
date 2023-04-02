<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product) {
        return view('product', [
            'product' => $product
        ]);
    }

    public function store(Request $request) {
        Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => (int)$request->id,
            'quantity' => (int)$request->quantity
        ]);

        return back()->with('success', $request->quantity);
    }
}
