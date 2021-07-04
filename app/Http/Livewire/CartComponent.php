<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class CartComponent extends Component
{
    public function increaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
    }
    public function decreaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
    }
    public function deleteProduct($rowId){
        $product = Cart::get($rowId);
        Cart::remove($rowId);
    }
    public function render()
    {
        return view('livewire.cart-component')->layout("layouts.base");
    }
}
