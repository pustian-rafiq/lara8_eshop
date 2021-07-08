<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;

class EditCategoryComponent extends Component
{ 
    
    public $category_slug;
    public $category_id;
    public $category_name;
    public $slug;

    public function mount($category_slug){ 
        //Get the particular category and row data of that category. Finallay assign data
        $this->category_slug = $category_slug;
        $category = Category::where('slug',$category_slug)->first();
        $this->category_id = $category->id;
        $this->category_name = $category->cat_name;
        $this->slug = $category->slug;
    }


    protected $rules = [
        'category_name' => 'required|min:6|unique:categories,cat_name',
         
    ];

    public function updated($rules)
    {
        $this->validateOnly($rules);
    }

    public function generateSlug(){
        $this->category_slug = Str::slug($this->category_name);

    }
    public function updateCategory(){
        $this->validate();

        $category =Category::find($this->category_id);
        $category->cat_name = $this->category_name;
        $category->slug = $this->category_slug;
        $category->save();

        // session()->flash('message','Category added successfully');
        //Livewire Alert
        $this->alert('success', 'Category has been updated successfully!', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  true, 
            'showConfirmButton' =>  false, 
      ]);
        
     // return redirect()->route('admin.categories');
    }
    public function render()
    {
        return view('livewire.admin.category.edit-category-component')->layout('layouts.admin');
    }
}
