<?php

namespace App\Http\Controllers\Category;

use App\Models\Laptop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\laptopCategory;

class LaptopCategoryController extends Controller
{
    //categorypage
    public function categoryPage()
    {
        $brandData = laptopCategory::get();
        return view('admin.category.laptop.laptopCategory', compact('brandData'));
    }
    //add category
    public function addCategory(Request $request)
    {
        $validation = $request->validate([
            'brand' => 'required'
        ]);
        $data = [
            'brand_name' => $request->brand,
        ];
        laptopCategory::create($data);
        $brandData = laptopCategory::get();
        return back()->with(['brandData' => $brandData]);
    }
    //category update page
    public function laptopCategoryUpdatePage($id)
    {
        $brandData = laptopCategory::where('laptopbrand_id', $id)->first();
        return view('admin.category.laptop.laptopCategoryupdate', compact('brandData'));
    }
    //update
    public function laptopCategoryUpdate(Request $request, $id)
    {

        $validation = $request->validate([
            'brand' => 'required',
        ]);
        $data = [
            'brand_name' => $request->brand,
        ];
        laptopCategory::where('laptopbrand_id', $id)->update($data);
        $brandData = laptopCategory::where('laptopbrand_id', $id)->first();
        return back()->with(['brandData' => $brandData]);
    }
}
