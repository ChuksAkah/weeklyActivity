<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request){
        $user = new USer;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json([
            'status' => 200,
            'user' => [
                'username' => $user->username,
                'name' => $user->name,
                'email' => $user->email
            ]
        ]);
    }

    public function login(Request $request){
        $user = User::where('username', $request->username)->first();
        if($user){
            if(password_verify($request->password, $user->password)){
                return response()->json([
                    'status' => 200,
                    'user' => [
                        'username' => $user->username,
                        'name' => $user->name,
                        'email' => $user->email
                    ]
                ]);
            }else{
                return response()->json([
                    'status' => 401,
                    'message' => 'Invalid password'
                ]);
            }
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'User not found'
            ]);
        }
    }
}
