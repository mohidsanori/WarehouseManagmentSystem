<?php

namespace App\Models\allproducts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    use HasFactory;
    protected $table = 'barcode';
    protected $fillable = [
        'product_id',
        'bar_num',
        'quantity'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
