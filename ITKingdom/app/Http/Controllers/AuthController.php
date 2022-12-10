<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\phoneCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //register
    public function register(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ];
        User::create($data);
        $userData = User::where('email', $request->email)->first();
        return response()->json([
            'userData' => $userData,
            'token' =>  $userData->createToken(time())->plainTextToken
        ]);
    }
    //login
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (isset($user)) {
            if (Hash::check($request->password, $user->password)) {
                return response()->json([
                    'userData' => $user,
                    'token' => $user->createToken(time())->plainTextToken
                ]);
            }
        } else {
            return response()->json([
                'userData' => null,
                'token' => null
            ]);
        }
    }
    //update
    public function updateUser(Request $request)
    {
        $id = $request->user_id;
        $data = [
            'name' => $request->user_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
        ];
        User::where('id', $id)->update($data);
        $updatedData = User::where('id', $id)->first();
        return response()->json([
            'userData' => $updatedData
        ]);
    }
    //change password
    public function updatePassword(Request $request)
    {
        $userId = $request->user_id;
        $dbData = User::where('id', $userId)->first();
        $dbPsw = $dbData->password;
        if (Hash::check($request->current_password, $dbPsw)) {
            $updatePassword = [
                'password' => Hash::make($request->new_password)
            ];
            User::where('id', $userId)->update($updatePassword);
            return response()->json([
                'userData' => true
            ]);
        } else {
            return response()->json([
                'userData' => false
            ]);
        }
    }
}
