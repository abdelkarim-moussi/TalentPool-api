<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtAuthController extends Controller
{

    public function register(Request $request){

        $validate = $request->validate(
            [
                'name'=>'required|string|max:255',
                'email'=>'required|email|max:255',
                'role'=>'required',
                'password'=>'required|confirmed'
            ]
            );

        $user = User::create($validate);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'user'=>$user,
            'token'=>$token
        ]);
    }
}
