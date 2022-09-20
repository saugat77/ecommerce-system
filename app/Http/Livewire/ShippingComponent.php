<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShippingComponent extends Component
{
    public function render()
    {
        return view('livewire.shipping-component')->layout('layouts.base');
    }
}
