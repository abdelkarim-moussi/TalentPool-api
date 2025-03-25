<?php

namespace App\Http\Controllers;

use App\Models\JobAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Tymon\JWTAuth\Facades\JWTAuth;

class StatisticsController extends Controller
{
    

    public function jobAdStatistiques(){

        if(Gate::denies('statistics')){

            return response()->json(
                [
                    'message'=>'not allowed'
                ]
                );
        }

        $totalAds = JobAd::where('recruiter_id',JWTAuth::user()->id)->count();
        
        return JWTAuth::user()->id;
    }
}
