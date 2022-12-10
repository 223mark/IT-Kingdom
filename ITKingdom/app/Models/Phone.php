<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand',
        'model',
        'image',
        'screen_size',
        'front_camera',
        'selfie_camera',
        'cpu',
        'battery',
        'color',
        'price',
        'status',
    ];
}
