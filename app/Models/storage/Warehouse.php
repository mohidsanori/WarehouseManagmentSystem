<?php

namespace App\Models\storage;


use Illuminate\Database\Eloquent\Model;
use App\Models\storage\WarehouseSections;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class warehouse extends Model
{
    use HasFactory;
    protected $table = 'warehouses';
    protected $fillable = [
        'name',
        'address',
        'town',
        'postalcode',
        'city',
        'country',
        'phone',
        'type',
        'fax',
        'email',
        'note'
    ];

    public function WarehousesSection()
    {
        return $this->hasMany(WarehouseSections::class, 'warehouse', 'id');
    }
}
