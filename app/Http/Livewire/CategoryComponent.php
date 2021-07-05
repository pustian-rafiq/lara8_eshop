<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
use App\Models\Category;
class CategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $category_slug;
    // Call mount method. When we click select box, sorting and pagesize change their values automatically and render the method
    public function mount($category_slug){
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->category_slug = $category_slug;
    }
    public function store($product_id, $product_name, $product_price){
        Cart::add($product_id,$product_name,1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message','Add item to cart');
        return redirect()->route('product.cart');
    }
    use WithPagination;
    public function render()
    {
       

        // Fetch category name and id using particular slug
        $category = Category::where('slug',$this->category_slug)->first();
        $cat_name = $category->cat_name;
        $cat_id = $category->id;
        // Sort the products using conditions in shop page
        if($this->sorting =="date"){
            $products = Product::where('category_id',  $cat_id)->orderBy('created_at','DESC')->paginate($this->pagesize );
        }else if($this->sorting =="price"){
            $products = Product::where('category_id',  $cat_id)->orderBy('regular_price','ASC')->paginate($this->pagesize );
        }else if($this->sorting =="price-desc"){
            $products = Product::where('category_id',  $cat_id)->orderBy('regular_price','DESC')->paginate($this->pagesize );
        }else{
            $products = Product::where('category_id',  $cat_id)->paginate($this->pagesize );
        }


        //Fetch Popular porduct at random orderby
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $categories = Category::all();
        return view('livewire.category-component',
           [
            'products'=> $products,
            'categories' => $categories,
            'category_name' => $cat_name,
            'popular_products' =>  $popular_products ,
            ])->layout("layouts.base");
    }
}
