<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;

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


    public function login(Request $request){

        $credentials = $request->only('email','password');

        try{
            if(! $token = JWTAuth::attempt($credentials)){
                return response()->json(
                    [
                        'error'=>'invalid credentials'
                    ]
                    );
            }
        }catch(JWTException $e){

            return response()->json(
                [
                    'error'=>'invalid token'.$e
                ]
                );
        }

        return response()->json(
            [
                'user'=>JWTAuth::user(),
                'token'=>$token
            ]
            );
    }
}
