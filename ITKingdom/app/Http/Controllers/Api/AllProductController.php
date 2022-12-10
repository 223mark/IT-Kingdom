<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Accessories;
use App\Models\ProductType;
use Illuminate\Http\Request;

class AllProductController extends Controller
{
    //get products
    public function getProductType()
    {
        $data = ProductType::get();
        return response()->json([
            'productType' => $data
        ]);
    }
    //get accessories
    public function getAccess()
    {
        $data = Accessories::select('accessories.*', 'product_types.*')
            ->leftJoin('product_types', 'product_types.productType_id', 'accessories.productType_id')
            ->get();
        return response()->json([
            'accessories'  => $data
        ]);
    }
    //get product detail
    public function getDetail(Request $request)
    {
        $id = $request->productId;
        $productDetail = Accessories::select('accessories.*', 'product_types.productType_name')
            ->leftJoin('product_types', 'accessories.productType_id', 'product_types.productType_id')
            ->where('id', $id)
            ->first();
        return response()->json([
            'productDetail' => $productDetail
        ]);
    }
}
