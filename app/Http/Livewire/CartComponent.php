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
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
          $this->emitTo('cart-count-component','refreshComponent');
    }
    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item has been deleted');
        
    }
    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
          $this->emitTo('cart-count-component','refreshComponent');
    }
    public function checkout()
    {
    if(Auth::check())
    {
        return redirect()->route('checkout');
    }
    else{
        return redirect()->route('login');
    }
    }
    public function setAmountForCheckout()
    {
       session()->put('checkout',[
           'discount'=>0,
           'subtotal'=>Cart::instance('cart')->subtotal(),
            'tax'=>Cart::instance('cart')->tax(),
            'total'=>Cart::instance('cart')->total()
       ]);
    }
    public function render()
    {

        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
        }
        $this->setAmountForCheckout();
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
