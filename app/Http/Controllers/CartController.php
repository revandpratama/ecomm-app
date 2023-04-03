<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart', [
            'cart_items' => Cart::where('user_id', '=', auth()->user()->id)->get()
        ]);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');

        if ($status == "inc") {
            Cart::find($id)->increment('quantity');
        } else {
            Cart::find($id)->decrement('quantity');
        }
    }

    public function destroy(Request $request)
    {
        Cart::destroy($request->id);
    }
}
