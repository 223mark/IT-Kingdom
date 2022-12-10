<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class AboutUserController extends Controller
{
    //index
    public function index()
    {
        $user = User::where('role', 'user')->get();
        return view('admin.user.userIndex', compact('user'));
    }
    //search user
    public function searchUser(Request $request)
    {
        $user = User::where('role', 'user')
            ->where('name', 'LIKE', '%' . $request->searchUser . '%')
            ->orWhere('email', 'LIKE', '%' . $request->searchUser . '%')
            ->orWhere('phone', 'LIKE', '%' . $request->searchUser . '%')
            ->get();
        return view('admin.user.userIndex', compact('user'));
    }
    //get user's order
    public function getuserOrder($id)
    {
        $orderData = Order::select('users.*', 'orders.*')
            ->leftJoin('users', 'users.id', 'orders.user_id')
            ->where('user_id', $id)->get();
        return view('admin.user.userOrder', compact('orderData'));
    }
}
