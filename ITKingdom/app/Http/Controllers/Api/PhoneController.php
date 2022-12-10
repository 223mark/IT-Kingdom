<?php

namespace App\Http\Controllers\Api;

use App\Models\Phone;
use Illuminate\Http\Request;
use App\Models\phoneCategory;
use App\Http\Controllers\Controller;

class PhoneController extends Controller
{
    //
    //get all phone
    public function getAllPhone()
    {
        $phoneData = Phone::select('phones.*', 'phone_categories.brand_name')
            ->leftJoin('phone_categories', 'phones.brand', 'phone_categories.phonebrand_id')
            ->get();
        return response()->json([
            'phoneData' => $phoneData
        ]);
    }
    //get phone detail
    public function getDetail(Request $request)
    {
        $id = $request->phoneId;
        $phoneData = Phone::select('phones.*', 'phone_categories.brand_name')
            ->leftJoin('phone_categories', 'phones.brand', 'phone_categories.phonebrand_id')
            ->where('phone_id', $id)->first();
        return response()->json([
            'phoneData' => $phoneData
        ]);
    }
    //get phone Categories
    public function getPhoneCategories()
    {
        $phoneCategory = phoneCategory::get();
        return response()->json([
            'phoneCategory' => $phoneCategory
        ]);
    }
}
