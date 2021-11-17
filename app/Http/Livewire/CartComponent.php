<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public function increaseQuatity($rowId)
    {
        //dd($rowId);
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty+1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
        //return redirect('carts');
    }

    public function decreaseQuatity($rowId)
    {
        //dd($rowId);
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty-1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
        //return redirect('carts');
    }

    public function destroy($id)
    {
        $rowId = $id;
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item has been removed');
        //return redirect('carts');
    }

    
    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','All items has been removed');
        //return redirect('carts');
    }

    public function checkout(){
        if(Auth::check()){
            return redirect()->action(CheckoutComponent::class,'checkout');
        }else{
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout(){
        if(!Cart::instance('cart')->count() > 0){
            session()->forget('checkout');
            return;
        }else{
            session()->put('checkout',[
                // 'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' =>  Cart::instance('cart')->total(),
            ]);
        }
    }

    // public function switchToSaveForLater($rowId){
    //     $item = Cart::instance('cart')->instance('cart')->get($rowId);
    //     Cart::instance('cart')->instance('cart')->remove($rowId);
    //     Cart::instance('cart')->instance('saveForLater')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
    // }

    public function render()
    {
        $this->setAmountForCheckout();
        return view('livewire.cart-component')
            ->layout('layouts.base');
    }
}
