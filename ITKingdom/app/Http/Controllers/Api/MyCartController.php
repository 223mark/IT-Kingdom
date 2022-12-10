<?php

namespace App\Http\Controllers\Api;

use App\Models\Phone;
use App\Models\MyCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MyCartController extends Controller
{
    //add cart
    public function addToCart(Request $request)
    {
        $userId = $request->user_id;
        $data = [
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'product_name' => $request->product_name,
            'image' => $request->image,
            'price' => $request->price,
            'total' => $request->total,
            'quantity' => $request->quantity
        ];
        MyCart::create($data);
        $cartData = MyCart::where('user_id', $userId)->get();
        return response()->json([
            'myCart' => $cartData
        ]);
    }
    //get myCart
    public function getmyCart(Request $request)
    {
        $id = $request->userId;
        $cartData = MyCart::where('user_id', $id)->get();
        return response()->json([
            'cart' => $cartData,
        ]);
    }
    //delete cart
    public function deleteCart(Request $request)
    {
        $id = $request->cartId;
        $userId = $request->userId;
        MyCart::where('id', $id)->delete();
        $cartData = MyCart::where('user_id', $userId)->get();
        return response()->json([
            'cartData' => $cartData
        ]);
        // $cartData = MyCart::where('id', $id)->first();
        // $dbImageName = $cartData->image;
        // File::delete(public_path() . '/phoneImage/' . $dbImageName);
        // File::delete(public_path() . '/phoneImage/' . $dbImageName);
        // File::delete(public_path() . '/phoneImage/' . $dbImageName);
    }
}
