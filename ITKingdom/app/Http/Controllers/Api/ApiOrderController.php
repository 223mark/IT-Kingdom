<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiOrderController extends Controller
{
    //add
    public function addOrder(Request $request)
    {
        $data = [
            'user_id'  => $request->user_id,
            'product_id' => $request->product_id,
            'product_name' => $request->product_name,
            'image' => $request->image,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'total_price'  => $request->total,
        ];
        Order::create($data);
        $orderData = Order::get();
        return response()->json([
            'orderedData' => $orderData
        ]);
    }
    //get
    public function getOrder(Request $request)
    {
        $id = $request->user_id;
        $data = Order::where('user_id', $id)->get();
        return response()->json([
            'orderData' => $data
        ]);
    }
}
