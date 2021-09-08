<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Shopping;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Kavist\RajaOngkir\RajaOngkir;

class AddOngkir extends Component
{
    private $apiKey = '0cd19d0c03305b063b01ca91b6258c86';
    public $shoppings = [];
    public $shopping, $province_id, $city_id;
    public $service_name, $provinces, $cities;

    public function mount($id)
    {
        if (!Auth::user($id)) {
            return redirect()->route('login');
        }

        $this->shopping = Shopping::find($id);
    }

    public function getOngkir()
    {
        if (!$this->province_id || !$this->city_id || !$this->service_name) {
            return;
        }
        $product = Product::find($this->shopping->product_id);
        $rajaOngkir = new RajaOngkir($this->apiKey);
        $cost = $rajaOngkir->ongkosKirim([
            'origin' => 489,
            'originType' => 'city',
            'destination' => $this->city_id,
            'weight' => $product->weight,
            'destinationType' => 'city',
            'courier' => 'jne:pos:tiki',
            'courier' => $this->service_name,
        ])->get();
        dd($cost);
        $this->service_name = $cost[0]['name'];
        foreach ($cost[0]['costs'] as $row) {
            $this->result[] = array(
                'description' => $row['description'],
                'biaya' => $row['cost'][0]['value'],
                'etd'   => $row['cost'][0]['etd']
            );
        }
    }

    public function render()
    {
        if (!$this->shopping) {
            // harus diubah menjadi informasi data shopping tidak ditemukan
            if (Auth::user()) {
                $this->shoppings = Shopping::where('user_id', Auth::user()->id)
                    ->with('product')->get();
            }

            return view('livewire.shopping-user')->extends('layouts.app')->section('content');
        }
        $rajaOngkir = new RajaOngkir($this->apiKey);
        $this->provinces = $rajaOngkir->provinsi()->all();

        if ($this->province_id) {
            $this->cities = $rajaOngkir->kota()->dariProvinsi($this->province_id)->get();
        }
        return view('livewire.add-ongkir')->extends('layouts.app')->section('content');
    }
}
