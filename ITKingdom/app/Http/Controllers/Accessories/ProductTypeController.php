<?php

namespace App\Http\Controllers\Accessories;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    //inddex
    public function index()
    {
        $productType = ProductType::get();
        return view('admin.otherproducts.otherCategory', compact('productType'));
    }
    //add type
    public function addType(Request $request)
    {
        $validation = $request->validate([
            'productType' => 'required'
        ]);
        $data = [
            'productType_name' => $request->productType
        ];
        ProductType::create($data);
        $productData = ProductType::get();
        return back()->with(['productType' => $productData]);
    }
}
