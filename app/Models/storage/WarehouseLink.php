<?php

namespace App\Models\storage;

use App\Models\allproducts\Product;
use Illuminate\Database\Eloquent\Model;
use App\Models\storage\WarehouseSections;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WarehouseLink extends Model
{
    use HasFactory;
    protected $table = 'warehouses_link';
    protected $fillable = [
        'product_id',
        'warehouse_id',
        'linked_quantity',
        'location'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function warehouse()
    {
        return $this->belongsTo(WarehouseSections::class, 'warehouse_id', 'id');
    }
}
