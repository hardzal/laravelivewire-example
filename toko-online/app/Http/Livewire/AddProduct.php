<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Livewire\WithFileUploads;
use Livewire\Component;

class AddProduct extends Component
{
    public $name, $price, $weight, $image;
    use WithFileUploads;

    public function mount()
    {
        if (Auth::user()) {
            if (Auth::user()->role_id !== 1) {
                return redirect()->to('');
            }
        }
    }

    public function store()
    {
        // validation
        $this->validate([
            'name'      => 'required',
            'price'     => 'required',
            'weight'    => 'required',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $image_name =  md5($this->image . microtime()) . '.' . $this->image->extension();
        Storage::disk('public')->putFileAs('photos', $this->image, $image_name);

        Product::create([
            'name' => $this->name,
            'price' => $this->price,
            'weight' => $this->weight,
            'image' => $image_name
        ]);

        return redirect()->to('');
    }

    public function render()
    {
        return view('livewire.add-product')
            ->extends('layouts.app')->section('content');
    }
}
