<?php

namespace App\Http\Controllers\Accessories;

use App\Http\Controllers\Controller;
use App\Models\Accessories;
use App\Models\ProductType;
use Illuminate\Http\Request;

class AccessoriesController extends Controller
{
    //index
    public function index()
    {
        $data = Accessories::get();
        return view('admin.otherproducts.otherIndex', compact('data'));
    }
    //add products
    public function addProductPage()
    {
        $typeData = ProductType::get();
        return view('admin.otherproducts.addProduct', compact('typeData'));
    }
    public function addProduct(Request $request)
    {
        $validation = $request->validate([
            'productName' => 'required',
            'productType' => 'required',
            'description' => 'required',
            'productCount' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);
        $file = $request->file('image');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path() . '/accressoriesImage/', $fileName);
        $data = [
            'productType_id' => $request->productType,
            'product_name' => $request->productName,
            'image' => $fileName,
            'price' => $request->price,
            'status' => $request->productCount,
            'description' => $request->description,
            'brand' => $request->brand,

        ];
        Accessories::create($data);
        $data = Accessories::get();
        return redirect()->route('admin#accessoriesIndex')->with(['data' => $data]);
    }
    //search
    public function searchAccessories(Request $request)
    {
        $data = Accessories::select('accessories.*', 'product_types.productType_name')
            ->leftJoin('product_types', 'accessories.productType_id', 'product_types.productType_id')
            ->where('accessories.product_name', 'LIKE', '%' . $request->accSearch . '%')
            ->orwhere('product_types.productType_name', 'LIKE', '%' . $request->accSearch . '%')
            ->paginate(6);
        //Session::put('JOB_SEARCH', $request->searchJob);
        $data->appends($request->all());
        return view('admin.otherproducts.otherIndex', compact('data'));
    }
}
