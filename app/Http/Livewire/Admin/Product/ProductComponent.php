<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;
class ProductComponent extends Component
{
    public function render()
    {
        $products = Product::all();
        return view('livewire.admin.product.product-component',['products' => $products])->layout('layouts.admin');
    }
}
