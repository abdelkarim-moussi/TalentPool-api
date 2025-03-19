<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtAuthentication extends Controller
{

    public function register(Request $request){

        $validate = $request->validate(
            [
                'name'=>'required|string|max:255',
                'email'=>'required|email|max:255',
                'role'=>'required',
                'password'=>'required|confirmend'
            ]
            );

        $user = DB::table('users')->insert($validate);

        $token = JWTAuth::
    }
}
