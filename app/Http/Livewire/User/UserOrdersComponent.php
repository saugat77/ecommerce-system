<?php

namespace App\Http\Livewire\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Livewire\Component;

class UserOrdersComponent extends Component
{
    public function deleteCategory($id)
    {
        $category= Order::find($id);
        $category->delete();
        session()->flash('message','Your order has been deleted');
    }
    public function render()
    {
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(12);
        return view('livewire.user.user-orders-component',['orders'=>$orders])->layout('layouts.base');
    }
}
