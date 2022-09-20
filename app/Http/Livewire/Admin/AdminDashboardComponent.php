<?php

namespace App\Http\Livewire\Admin;
use App\Models\Order;
use Carbon\Carbon;

use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $orders = Order::orderBy('created_at','DESC')->get()->take(10);
        $totalRevenue = Order::sum('total');
        $todaySales = Order::whereDate('created_at',Carbon::today())->count();
        $todayRevenue = Order::whereDate('created_at',Carbon::today())->sum('total');
        return view('livewire.admin.admin-dashboard-component',['orders'=>$orders,'totalRevenue'=>$totalRevenue,'todayRevenue'=>$todayRevenue ,'todaySales'=>$todaySales ])->layout('layouts.base');
    }
}
