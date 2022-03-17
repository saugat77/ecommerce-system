<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
    }
    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message','Item has been deleted');
    }
    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
    }
    public function render()
    {

        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
        }
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
