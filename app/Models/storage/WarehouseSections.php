<?php

namespace App\Models\storage;

use App\Models\storage\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WarehouseSections extends Model
{
    use HasFactory;
    protected $table = 'warehouses_sections';
    protected $fillable = [
        'warehouse',
        'section',
        'rows',
        'columns',
        'shelves',
        'racks'
    ];

    public function Warehouses()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse', 'id');
    }
}
