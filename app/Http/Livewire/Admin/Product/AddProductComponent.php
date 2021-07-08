<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;

use App\Models\Product;
class AddProductComponent extends Component
{
    use WithFileUploads;
    public $product_name;
    public $product_slug;
    public $product_category;
    public $short_description;
    public $regular_price;
    public $sale_price;
    public $product_sku;
    public $stock_status;
    public $featured_product;
    public $product_quantity;
    public $product_image;
    public $product_description;
    

    public function mount(){
        $this->featured_product = 0;
        $this->stock_status = 'instock';
    }
    public function generateSlug(){
        $this->product_slug = Str::slug($this->product_name,'-');
    }


    // Real time validation
    protected $rules = [
        'product_name' => 'required|min:4|unique:products,product_name',
       
        'short_description' => 'required|min:10',
        'regular_price' => 'required',
        'product_sku' => 'required|unique:products,SKU',
        'product_quantity' => 'required',
        'product_image' => 'required',
        'product_description' => 'required',
         
    ];

    public function updated($rules)
    {
        $this->validateOnly($rules);
    }


    public function addProduct(){
        $this->validate();
        
        $product = new Product();

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
        $imageName                       = Carbon::now()->timestamp.'.'.$this->product_image->extension();
        $this->product_image->storeAs('products', $imageName);
        $product->image = $imageName;
       
        $product->category_id            = $this->product_category;

        $product->save();

        $this->alert('success', 'Product has been added successfully!', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true, 
            'text' =>  '', 
            'confirmButtonText' =>  'Ok', 
            'cancelButtonText' =>  'Cancel', 
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false, 
      ]);
    }
   
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.product.add-product-component',['categories' => $categories])->layout('layouts.admin');
    }
}
