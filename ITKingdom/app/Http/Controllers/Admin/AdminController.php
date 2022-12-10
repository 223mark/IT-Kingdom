<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //profile
    public function profile()
    {
        $userData = User::where('id', Auth()->user()->id)->first();
        return view('admin.profile.profile', compact('userData'));
    }
    //update profile
    public function updateProfile(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' =>  $request->phone,
            'gender' =>  $request->gender,
            'address' =>  $request->address,
        ];
        $userData = User::where('id', Auth()->user()->id)->update($data);
        return back()->with(['userData', $userData]);
    }
    //psw section
    public function changePswPage()
    {
        return view('admin.profile.changePassword');
    }
    public function changePassword(Request $request)
    {
        $validation = $request->validate([
            'currentPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|min:6|same:newPassword',

        ]);
        $dbPsw = User::select('password')->where('id', Auth()->user()->id)->first();
        $hashdbPsw = $dbPsw->password;
        if (Hash::check($request->currentPassword, $hashdbPsw)) {
            $newPsw = [
                'password' => Hash::make($request->newPassword),
            ];
            User::where('id', Auth()->user()->id)->update($newPsw);
            return redirect()->route('dashboard')->with(['pswChangeSuccess' => 'Password Changed Successfully..']);
        } else {
            return back()->with(['PswnotMatch' => 'Currend Password doenot match.Please try again!..']);
        }
    }
}
