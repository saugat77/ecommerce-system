<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class AdminHomeCategoryComponent extends Component
{
    public $selected_categories = [];
    public $numberofproducts;
    public function mount()
    {
        $category = HomeCategory::find(1);
        $this->selected_categories = explode(',',$category->selected_categories);
        $this->numberofproducts = $category->numberofproducts;
    }
    public function updateHomeCategory()
    {
        $category = HomwCategory::find(1);
        $category->sel_categories = implode(',',$this->selected_categories);
        $category->no_of_products = $this->numberofproducts;
        $category->save();
        session()->flash('message','HomeCategory has been updated successfully');

    }

    public function render()
    {     
        $categories = Category::all();
        return view('livewire.admin.admin-home-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}
