<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;
class AddCategoryComponent extends Component
{
    public $category_name;
    public $category_slug;

    public function generateSlug(){
        $this->category_slug = Str::slug($this->category_name);

    }
    public function addCategory(){
        $category = new Category();
        $category->cat_name = $this->category_name;
        $category->slug = $this->category_slug;
        $category->save();

        session()->flash('message','Category added successfully');
        
    }
    public function render()
    {
        return view('livewire.admin.category.add-category-component')->layout("layouts.admin");
    }
}
