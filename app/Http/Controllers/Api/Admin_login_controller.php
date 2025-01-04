<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Admin_login_controller extends Controller
{
    public function ShowLoginPage()
    {
        return view('Admin.Login');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:student,teacher'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);
        return response()->json(
            [
                'message' => 'User created successfully',
                'status' => 'true',
                ]
            );
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user=User::where('email', $request->email)->first();
        if(!empty($user)){
            if(Hash::check($request->password,$user->password)){
                return response()->json([
                    'message' => 'User registered successfully',
                    'status' => 'true',
                    'token' => $user->createToken('Token')->plainTextToken,
                ]);
            }
            else{
                return response()->json(
                    [
                        'message' => 'wrong password',
                        'status' => 'false',
                        'data'=>[]
                    ]
                );
            };
        }else{
            return response()->json(
                [
                    'message' => 'User not found',
                    'status' => 'false',
                    'data'=>[]
                ]
            );
        }
        
    }

}
?>