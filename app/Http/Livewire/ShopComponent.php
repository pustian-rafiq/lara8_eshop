<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;
    // Call mount method. When we click select box, sorting and pagesize change their values automatically and render the method
    public function mount(){
        $this->sorting = "default";
        $this->pagesize = 12;
    }
    public function store($product_id, $product_name, $product_price){
        Cart::add($product_id,$product_name,1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message','Add item to cart');
        return redirect()->route('product.cart');
    }
    use WithPagination;
    public function render()
    {
        // Sort the products using conditions in shop page
        if($this->sorting =="date"){
            $products = Product::orderBy('created_at','DESC')->paginate($this->pagesize );
        }else if($this->sorting =="price"){
            $products = Product::orderBy('regular_price','ASC')->paginate($this->pagesize );
        }else if($this->sorting =="price-desc"){
            $products = Product::orderBy('regular_price','DESC')->paginate($this->pagesize );
        }else{
            $products = Product::paginate($this->pagesize );
        }
       
        return view('livewire.shop-component',['products'=> $products])->layout("layouts.base");
    }
}
