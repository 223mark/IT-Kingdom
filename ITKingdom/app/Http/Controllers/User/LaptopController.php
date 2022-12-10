<?php

namespace App\Http\Controllers\User;

use App\Models\Laptop;
use Illuminate\Http\Request;
use App\Models\laptopCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class LaptopController extends Controller
{
    //index
    public function index()
    {
        $laptopData = Laptop::select('laptops.*', 'laptop_categories.brand_name')
            ->leftJoin('laptop_categories', 'laptops.brand', 'laptop_categories.laptopbrand_id')
            ->get();
        return view('admin.laptop.index', compact('laptopData'));
    }
    //add
    public function addLaptopPage()
    {
        $category = laptopCategory::get();
        return view('admin.laptop.addLaptop', compact('category'));
    }
    public function addLaptop(Request $request)
    {
        $validation = $request->validate([
            'model' => 'required',
            'brand' => 'required',
            'screenSize' => 'required',
            'selfieCamera' => 'required',
            'cpu' => 'required',
            'battery' => 'required',
            'price' => 'required',
            'color' => 'required',
            'statusCount' => 'required',
        ]);
        $file = $request->file('image');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path() . '/laptopImage', $fileName);
        $laptopData = [
            'brand' => $request->brand,
            'model' => $request->model,
            'image' => $fileName,
            'screen_size' => $request->screenSize,
            'selfie_camera' => $request->selfieCamera,
            'cpu' => $request->cpu,
            'battery' => $request->battery,
            'color' => $request->color,
            'price' => $request->price,
            'status' => $request->statusCount,
        ];
        Laptop::create($laptopData);
        $data = Laptop::get();
        return redirect()->route('admin#laptopIndex')->with(['laptopData' => $data]);
    }
    public function editLaptop($id)
    {
        $categoryData = laptopCategory::get();
        $laptopData = Laptop::select('laptops.*', 'laptop_categories.brand_name')
            ->leftJoin('laptop_categories', 'laptops.brand', 'laptop_categories.laptopbrand_id')
            ->where('laptop_id', $id)
            ->first();
        return view('admin.laptop.edit', compact('categoryData', 'laptopData'));
    }
    public function updateLaptop(Request $request, $id)
    {
        $validation = $request->validate([
            'model' => 'required',
            'brand' => 'required',
            //'image' => 'required',
            'screenSize' => 'required',
            'selfieCamera' => 'required',
            'cpu' => 'required',
            'battery' => 'required',
            'price' => 'required',
            'color' => 'required',
            'statusCount' => 'required',
        ]);

        if ($request->image != null) {
            $postData = Laptop::where('laptop_id', $id)->first();
            if ($postData != null) {
                $dbImageName = $postData->image;
                File::delete(public_path() . '/laptopImage/' . $dbImageName);
            }
            $file = $request->file('image');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path() . '/laptopImage/', $fileName);
            $laptopData = [
                'brand' => $request->brand,
                'model' => $request->model,
                'image' => $fileName,
                'screen_size' => $request->screenSize,
                'selfie_camera' => $request->selfieCamera,
                'cpu' => $request->cpu,
                'battery' => $request->battery,
                'color' => $request->color,
                'price' => $request->price,
                'status' => $request->statusCount,
            ];
        } else {
            $laptopData = [
                'brand' => $request->brand,
                'model' => $request->model,
                'screen_size' => $request->screenSize,
                'selfie_camera' => $request->selfieCamera,
                'cpu' => $request->cpu,
                'battery' => $request->battery,
                'color' => $request->color,
                'price' => $request->price,
                'status' => $request->statusCount,
            ];
        }
        $updateData = Laptop::where('laptop_id', $id)->update($laptopData);
        return redirect()->route('admin#laptopIndex');
    }
    //search
    public function searchLaptop(Request $request)
    {
        $laptopData = Laptop::select('laptops.*', 'laptop_categories.brand_name')
            ->leftJoin('laptop_categories', 'laptops.brand', 'laptop_categories.laptopbrand_id')
            ->where('laptops.model', 'LIKE', '%' . $request->laptopSearch . '%')
            ->orwhere('laptop_categories.brand_name', 'LIKE', '%' . $request->laptopSearch . '%')
            ->paginate(6);
        //Session::put('JOB_SEARCH', $request->searchJob);
        $laptopData->appends($request->all());
        return view('admin.laptop.index', compact('laptopData'));
    }
}
