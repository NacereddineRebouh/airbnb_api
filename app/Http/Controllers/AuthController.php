<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields=$request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed',
        ]);


        $user=User::Create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
            'password'=>bcrypt($fields['password']),
        ]);
        return response(['success'=>$user]);//201:: Done & Something was created
    }
    public function test()
    {
        return "works fine";
    }
    public function login(request $request)
    {
        $fields=$request->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);
        $user=User::where('email', $fields['email'])->first();
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response(['error'=>'Bad creds']);//unauthorized
        }

        return response(["success"=>$user]);//201:: Done & Something was created
    }
}
