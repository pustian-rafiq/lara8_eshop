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
    // Remove one item from the cart
    public function deleteProduct($rowId){
        Cart::remove($rowId);
        session()->flash('success_message','All items have been removed from cart');
        
    }
    // Remove all items from the cart
    public function deleteAllProduct(){
        Cart::destroy();
    }
    public function render()
    {
        return view('livewire.cart-component')->layout("layouts.base");
    }
}
