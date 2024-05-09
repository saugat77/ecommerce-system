<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCountComponent extends Component
{
    public $listeners = ['refreshComponent'=>'$refresh'];
    public function render()
    {
        return view('livewire.cart-count-component');
    }
}
