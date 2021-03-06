<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;
class AddCategoryComponent extends Component
{
    public $category_name;
    public $category_slug;

    // Simple validation
    // protected $rules = [
    //     'category_name' => 'required|min:4',
        
    // ];
  // Real time validation
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
    public function addCategory(){
        $this->validate();

        $category = new Category();
        $category->cat_name = $this->category_name;
        $category->slug = $this->category_slug;
        $category->save();

        // session()->flash('message','Category added successfully');
        //Livewire Alert
        $this->alert('success', 'Category has been added successfully!', [
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
       
        // $notification=array(
        //     'messege'=>'Category Inserted Successfully',
        //     'alert-type'=>'success'
        //           );
        return view('livewire.admin.category.add-category-component')->layout("layouts.admin");
    }
}
