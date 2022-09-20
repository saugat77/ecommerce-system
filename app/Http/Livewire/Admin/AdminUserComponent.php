<?php

namespace App\Http\Livewire\Admin;
use App\Models\User;
use Livewire\Component;

class AdminUserComponent extends Component
{
    public function deleteCategory($id)
    {
        $category= User::find($id);
        $category->delete();
        session()->flash('message','User has been deleted');
    }
    public function render()
    {
        $orders = User::orderBy('created_at','DESC')->paginate(12);
        return view('livewire.admin.admin-user-component',['orders'=>$orders])->layout('layouts.base');
    }
}
