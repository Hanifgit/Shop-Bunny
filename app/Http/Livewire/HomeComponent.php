<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $latestProduct = Product::orderBy('created_at','DESC')->get();
        return view('livewire.home-component',['latestProduct'=>$latestProduct])->layout('layouts.base');
    }
}
