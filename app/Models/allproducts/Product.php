<?php

namespace App\Models\allproducts;

use App\Models\allproducts\Type;
use App\Models\allproducts\Brand;
use App\Models\allproducts\Barcode;
use App\Models\allproducts\Category;
use App\Models\storage\WarehouseLink;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'type',
        'brand',
        'category',
        'status',
        'min_stock',
        'quantity',
        'reorder',
        'linked_quantity',
        'sale_price',
        'product_image',
        'description'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function barcode()
    {
        return $this->hasMany(Barcode::class, 'product_id', 'id');
    }

    public function warehouse()
    {
        return $this->belongsTo(WarehouseSections::class, 'warehouse_id', 'id');
    }
}
