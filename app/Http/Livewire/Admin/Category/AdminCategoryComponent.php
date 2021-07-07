<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
class AdminCategoryComponent extends Component
{
   

    public function render()
    {
        $categories = Category::all();
       
        return view('livewire.admin.category.admin-category-component',['categories' => $categories])->layout('layouts.admin');
    }
}
