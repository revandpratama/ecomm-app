<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartIndex extends Component
{
    public function render()
    {
        return view('livewire.cart-index', [
            'items' => Cart::latest()->where('user_id', '=', auth()->user()->id)->get()
        ]);
    }

    public function increment($id) 
    {
        $item = Cart::find($id);
        $item->quantity += 1;
        $item->save();
    }
    public function decrement($id) 
    {
        $item = Cart::find($id);
        $item->quantity -= 1;
        $item->save();
    }

    public function delete($id)
    {
        Cart::destroy($id);
    }
}
