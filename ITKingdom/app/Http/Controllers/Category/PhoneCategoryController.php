<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\phoneCategory;
use Illuminate\Http\Request;

class PhoneCategoryController extends Controller
{
    //page
    public function categoryPage()
    {
        $brandData = phoneCategory::get();
        return view('admin.category.phone.phoneCategory', compact('brandData'));
    }
    //add
    public function addCategory(Request $request)
    {
        $validation = $request->validate([
            'brand' => 'required'
        ]);
        $data = [
            'brand_name' => $request->brand,
        ];
        phoneCategory::create($data);
        $brandData = phoneCategory::get();
        return back()->with(['brandData' => $brandData]);
    }
    //category update page
    public function phoneCategoryUpdatePage($id)
    {
        $brandData = phoneCategory::where('phonebrand_id', $id)->first();
        return view('admin.category.phone.phoneCategoryUpdate', compact('brandData'));
    }
    //update
    public function phoneCategoryUpdate(Request $request, $id)
    {

        $validation = $request->validate([
            'brand' => 'required',
        ]);
        $data = [
            'brand_name' => $request->brand,
        ];
        phoneCategory::where('phonebrand_id', $id)->update($data);
        $brandData = phoneCategory::where('phonebrand_id', $id)->first();
        return back()->with(['brandData' => $brandData]);
    }
}
