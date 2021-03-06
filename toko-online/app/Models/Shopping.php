<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'total_harga',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
