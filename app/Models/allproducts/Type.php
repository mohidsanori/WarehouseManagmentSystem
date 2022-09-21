<?php

namespace App\Models\allproducts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = 'types';
    protected $fillable = [
        'title',
        'description'
    ];
}
