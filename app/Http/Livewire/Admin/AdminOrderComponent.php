<?php

namespace App\Http\Livewire\Admin;
use App\Models\Order;

use Livewire\Component;

class AdminOrderComponent extends Component
{
    public function deleteCategory($id)
    {
        $category= Order::find($id);
        $category->delete();
        session()->flash('message','Order has been deleted');
    }
        public function render()
    {
        $orders = Order::orderBy('created_at','DESC')->paginate(12);
        return view('livewire.admin.admin-order-component',['orders'=>$orders])->layout('layouts.base');
    }
}
