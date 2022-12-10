<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand',
        'model',
        'image',
        'screen_size',
        'selfie_camera',
        'cpu',
        'battery',
        'color',
        'price',
        'status',
    ];
}
