<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;
class EditProductComponent extends Component
{
    use WithFileUploads;
    public $product_name;
    public $product_slug;
    public $product_category_id;
    public $short_description;
    public $regular_price;
    public $sale_price;
    public $product_sku;
    public $stock_status;
    public $featured_product;
    public $product_quantity;
    public $product_image;
    public $product_description;
    public $newImage;
    public $porduct_id;

    public function generateSlug(){
        $this->product_slug = Str::slug($this->product_name,'-');
    }
    public function  mount($product_slug){
        $product = Product::where('slug',$product_slug)->first();

        $this->product_name = $product->product_name;
        $this->product_slug = $product->slug;
        $this->product_category_id = $product->category_id;
        $this->short_description = $product->short_description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->product_sku = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured_product = $product->featured_product;
        $this->product_quantity = $product->quantity;
        $this->product_image = $product->image;
        $this->product_description = $product->description;
     
        $this->porduct_id = $product->id;

    }


    // Real time validation
    protected $rules = [
        'product_name' => 'required|min:4',
       
        'short_description' => 'required|min:10',
        'regular_price' => 'required',
        'product_sku' => 'required',
        'product_quantity' => 'required',
        
        'product_description' => 'required',
         
    ];

    public function updated($rules)
    {
        $this->validateOnly($rules);
    }

public function resetProduct(){
    $products = Product::all();
    return view('livewire.admin.product.product-component',['products' => $products])->layout('layouts.admin');
}
    public function updateProduct(){
        $this->validate();
        
        $product = Product::find($this->porduct_id);

        $product->product_name           = $this->product_name;
        $product->slug                   = $this->product_slug;
        $product->short_description      = $this->short_description;
        $product->description           = $this->product_description;
        $product->regular_price          = $this->regular_price;
        $product->sale_price             = $this->sale_price;
        $product->SKU                    = $this->product_sku;
        $product->stock_status           = $this->stock_status;
        $product->featured_product       = $this->featured_product;
        $product->quantity               = $this->product_quantity;
        //If we give new image , it is updated
        if($this->newImage){
            $imageName                       = Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('products', $imageName);
            $product->image = $imageName;
        }
       
        $product->category_id            = $this->product_category_id;

        $product->save();
     
        $this->alert('success', 'Product has been updated successfully!', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false, 
      ]);

      $this->resetProduct();
    }


    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.product.edit-product-component',['categories' => $categories])->layout('layouts.admin');
    }
}
