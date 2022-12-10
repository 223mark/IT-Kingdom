<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    //get order
    public function getOrder()
    {
        $data = Order::select('orders.*', 'users.*', 'orders.id as order_id')
            ->leftJoin('users', 'users.id', 'orders.user_id')
            ->paginate(5);
        return view('admin.order.orderIndex', compact('data'));
    }
    //search user and product
    public function searchUser(Request $request)
    {
        $data = Order::select('orders.*', 'users.*', 'orders.id as order_id')
            ->leftJoin('users', 'orders.user_id', 'users.id')
            ->where('name', 'LIKE', '%' . $request->searchUser . '%')
            ->orWhere('product_name', 'LIKE', '%' . $request->searchUser . '%')
            ->paginate(5);
        $data->appends($request->all());
        return view('admin.order.orderIndex', compact('data'));
    }
    //set order status
    public function setStatus(Request $request, $id)
    {
        $validation = $request->validate([
            'orderStatus' => 'required'
        ]);
        $data = [
            'deli_status' => $request->orderStatus
        ];
        $updateData = Order::where('id', $id)->update($data);
        return redirect()->route('admin#getOrder')->with(['messsage' => 'Delievery Status Set']);
    }
    //delete order
    public function orderDelete($id)
    {
        Order::where('id', $id)->delete();
        return redirect()->route('admin#getOrder');
    }
    //get delievered order
    public function filteredorders(Request $request)
    {

        $validation = $request->validate([
            'filtered' => 'required'
        ]);
        $filteredData = Order::select('orders.*', 'users.*', 'orders.id as order_id')
            ->leftJoin('users', 'users.id', 'orders.user_id')
            ->where('deli_status', $request->filtered)->paginate(7);
        return view('admin.order.orderfilter')->with(['data' => $filteredData]);
    }
    //all delievered orders deleted
    public function delieveredAlldelete()
    {
        Order::where('deli_status', 'Delievered')->delete();
        return redirect()->route('admin#getOrder');
    }
}
