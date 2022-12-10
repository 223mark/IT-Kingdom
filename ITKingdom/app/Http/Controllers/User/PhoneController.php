<?php

namespace App\Http\Controllers\User;

use App\Models\Phone;
use Illuminate\Http\Request;
use App\Models\phoneCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PhoneController extends Controller
{
    //list
    public function index()
    {
        $phoneData = Phone::select('phones.*', 'phone_categories.brand_name')
            ->leftJoin('phone_categories', 'phones.brand', 'phone_categories.phonebrand_id')
            ->get();
        return view('admin.phone.index', compact('phoneData'));
    }
    //add
    public function addPhonePage()
    {
        $categoryData = phoneCategory::get();
        return view('admin.phone.addphone', compact('categoryData'));
    }
    public function addPhone(Request $request)
    {

        $validation = $request->validate([
            'model' => 'required',
            'brand' => 'required',
            'image' => 'required',
            'screenSize' => 'required',
            'frontCamera' => 'required',
            'selfieCamera' => 'required',
            'cpu' => 'required',
            'battery' => 'required',
            'price' => 'required',
            'color' => 'required',
            'statusCount' => 'required',
        ]);
        $file = $request->file('image');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path() . '/phoneImage', $fileName);
        $phoneData = [
            'brand' => $request->brand,
            'model' => $request->model,
            'image' => $fileName,
            'screen_size' => $request->screenSize,
            'front_camera' => $request->frontCamera,
            'selfie_camera' => $request->selfieCamera,
            'cpu' => $request->cpu,
            'battery' => $request->battery,
            'color' => $request->color,
            'price' => $request->price,
            'status' => $request->statusCount,
        ];
        Phone::create($phoneData);
        $data = Phone::get();
        return redirect()->route('phoneList#index')->with(['phoneData' => $data]);
    }
    //phone edit page
    public function phoneEdit($id)
    {
        $categoryData = phoneCategory::get();
        $phoneData = Phone::select('phones.*', 'phone_categories.brand_name')
            ->leftJoin('phone_categories', 'phones.brand', 'phone_categories.phonebrand_id')
            ->where('phone_id', $id)->first();
        //dd($phoneData->toArray());
        return view('admin.phone.edit', compact('categoryData', 'phoneData'));
    }
    //phone update
    public function phoneUpdate(Request $request, $id)
    {
        $validation = $request->validate([
            'model' => 'required',
            'brand' => 'required',
            //'image' => 'required',
            'screenSize' => 'required',
            'frontCamera' => 'required',
            'selfieCamera' => 'required',
            'cpu' => 'required',
            'battery' => 'required',
            'price' => 'required',
            'color' => 'required',
            'statusCount' => 'required',
        ]);

        if ($request->image != null) {
            $postData = Phone::where('phone_id', $id)->first();
            if ($postData != null) {
                $dbImageName = $postData->image;
                File::delete(public_path() . '/phoneImage/' . $dbImageName);
            }
            $file = $request->file('image');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path() . '/phoneImage/', $fileName);
            $phoneData = [
                'brand' => $request->brand,
                'model' => $request->model,
                'image' => $fileName,
                'screen_size' => $request->screenSize,
                'front_camera' => $request->frontCamera,
                'selfie_camera' => $request->selfieCamera,
                'cpu' => $request->cpu,
                'battery' => $request->battery,
                'color' => $request->color,
                'price' => $request->price,
                'status' => $request->statusCount,
            ];
        } else {
            $phoneData = [
                'brand' => $request->brand,
                'model' => $request->model,
                'screen_size' => $request->screenSize,
                'front_camera' => $request->frontCamera,
                'selfie_camera' => $request->selfieCamera,
                'cpu' => $request->cpu,
                'battery' => $request->battery,
                'color' => $request->color,
                'price' => $request->price,
                'status' => $request->statusCount,
            ];
        }
        $updateData = Phone::where('phone_id', $id)->update($phoneData);
        return redirect()->route('phoneList#index');
    }
    //phone Serach
    public function  phoneSearch(Request $request)
    {
        //ListOfJobs::where('job_title', 'like', '%' . $request->searchJob . '%')
        $phoneData = Phone::select('phones.*', 'phone_categories.brand_name')
            ->leftJoin('phone_categories', 'phones.brand', 'phone_categories.phonebrand_id')
            ->where('phones.model', 'LIKE', '%' . $request->phoneSearch . '%')
            ->orwhere('phone_categories.brand_name', 'LIKE', '%' . $request->phoneSearch . '%')
            ->paginate(6);
        //Session::put('JOB_SEARCH', $request->searchJob);
        $phoneData->appends($request->all());
        return view('admin.phone.index', compact('phoneData'));
    }
}
