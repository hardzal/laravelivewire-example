<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Shopping;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public $products = [];
    public $search, $min_price, $max_price;

    public function buyProduct($id)
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        $product = Product::find($id);

        Shopping::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'total_harga' => $product->price,
            'status' => 0
        ]);

        return redirect()->route('shopping');
    }

    public function render()
    {
        if ($this->max_price) {
            $harga_max = $this->max_price;
        } else {
            $harga_max = Product::max('price');
        }
        if ($this->min_price) {
            $harga_min = $this->min_price;
        } else {
            $harga_min = Product::min('price');
        }

        if ($this->search) {
            $this->products = Product::where('name', 'like', '%' . $this->search . '%')->where('price', '>=', $harga_min)->where('price', '<=', $harga_max)
                ->get();
        } else if ($this->max_price || $this->min_price) {
            $this->products = Product::where('price', '>=', $harga_min)->where('price', '<=', $harga_max)->get();
        } else {
            $this->products = Product::all();
        }

        return view('livewire.home')
            ->extends('layouts.app')->section('content');
    }
}
