<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return view('product', [
            'product' => $product
        ]);
    }

    public function store(Request $request)
    {
        
        if (Cart::where('user_id', auth()->user()->id)->where('product_id', $request->id)->count() > 0) {
            $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $request->id)->first();
            $cart->quantity += $request->quantity;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => (int)$request->id,
                'quantity' => (int)$request->quantity
            ]);
        }



        return back()->with('success', $request->quantity);
    }
}
