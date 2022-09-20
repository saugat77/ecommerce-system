<?php

namespace App\Http\Livewire\User;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboardComponent extends Component
{
    public function render()
    {
        $orders = Order::orderBy('created_at','DESC')->where('user_id',Auth::user()->id)->get()->take(10);
        $totalPurchase = Order::where('user_id',Auth::user()->id)->sum('total');
        $todayPurchase = Order::whereDate('created_at',Carbon::today())->count();
        $todayBuy = Order::whereDate('created_at',Carbon::today())->sum('total');
        return view('livewire.user.user-dashboard-component',['orders'=>$orders,'totalPurchase'=>$totalPurchase,'todayPurchase'=>$todayPurchase ,'todayBuy'=>$todayBuy])->layout('layouts.base');
    }
}
