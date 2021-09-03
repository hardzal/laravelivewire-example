<?php

namespace App\Http\Livewire;

use App\Models\Shopping;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShoppingUser extends Component
{
    public $shoppings = [];
    public function mount()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
    }

    public function destroy($id)
    {
        $checkout = Shopping::find($id);
        $checkout->delete();
    }

    public function render()
    {
        if (Auth::user()) {
            $this->shoppings = Shopping::where('user_id', Auth::user()->id)
                ->with('product')->get();
        }

        return view('livewire.shopping-user')->extends('layouts.app')->section('content');
    }
}
