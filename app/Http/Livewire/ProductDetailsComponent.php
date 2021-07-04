<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;
class ProductDetailsComponent extends Component
{
    public $slug;
    public function mount($slug){
        $this->slug = $slug;
    }
    public function store($product_id, $product_name, $product_price){
        Cart::add($product_id,$product_name,1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message','Add item to cart');
        return redirect()->route('product.cart');
    }
    
    public function render()
    {
        //Fetch product details one product
        $product = Product::where('slug',$this->slug)->first();
        //Fetch Popular porduct at random orderby
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        //Fetch all related products using category_id of product details product
        $related_products = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        return view('livewire.product-details-component',[
            'product' => $product,
            'popular_products' => $popular_products,
            'related_products' => $related_products
            
            ])->layout('layouts.base');
    }
}
