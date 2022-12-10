<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    use HasFactory;
    protected $fillable = [
        'productType_id',
        'product_name',
        'image',
        'price',
        'status',
        'brand',
        'description',
        'discount_price'
    ];
}
