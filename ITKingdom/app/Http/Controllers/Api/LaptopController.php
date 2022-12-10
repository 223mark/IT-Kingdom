<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Laptop;
use App\Models\laptopCategory;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    //getall laptop
    public function getAllLaptop()
    {
        $laptopData = Laptop::select('laptops.*', 'laptop_categories.brand_name')
            ->leftJoin('laptop_categories', 'laptops.brand', 'laptop_categories.laptopbrand_id')
            ->get();
        return response()->json([
            'laptopData' => $laptopData
        ]);
    }
    //get laptop detail
    public function getDetail(Request $request)
    {
        $id = $request->laptopId;
        $data = Laptop::select('laptops.*', 'laptop_categories.brand_name')
            ->leftJoin('laptop_categories', 'laptops.brand', 'laptop_categories.laptopbrand_id')
            ->where('laptop_id', $id)
            ->first();
        return response()->json([
            'laptopDetail' => $data
        ]);
    }
    //get brands
    public function getBrand()
    {
        $laptopBrands = laptopCategory::get();
        return response()->json([
            'brand' => $laptopBrands
        ]);
    }
}
