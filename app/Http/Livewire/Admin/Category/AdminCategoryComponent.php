<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
class AdminCategoryComponent extends Component
{
    public $deleteId = '';
    public function deleteId($id)
    {
        $this->deleteId = $id;
    }
   public function delete(){
       $category = Category::find($this->deleteId);
       $category->delete();
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
   
 //session()->flash('message','Order deleted successfully!');
  //return redirect()->route('admin.categories');
   }

    public function render()
    {
        $categories = Category::all();
       
        return view('livewire.admin.category.admin-category-component',['categories' => $categories])->layout('layouts.admin');
    }
}
