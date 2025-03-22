<?php

namespace App\Http\Controllers;

use App\Models\JobAd;
use App\Services\JobAdService;
use Illuminate\Http\Request;

class JobAdController extends Controller
{
    protected $jobAdService;

    public function __construct(JobAdService $jobAdService)
    {
        $this->jobAdService = $jobAdService;
    }
    
    public function index(){

        $jobAds = $this->jobAdService->getAllJobAds();

        return response()->json(
            [
                'jobAds'=>$jobAds
            ]
        );

    }

    public function store(Request $request){
    
        $jobAd = $this->jobAdService->createJobAdd($request);

        return response()->json(compact('jobAd'));
    }

    public function update($id,Request $request){

       $jobAd = $this->jobAdService->updateJobAd($id,$request);

        return response()->json(
            [
                'message'=>'your application updated succefully',
                'jobAd'=>$jobAd
            ]
            );

    }

    public function destroy($id){

        $jobAd = $this->jobAdService->deleteJobAd($id);
        return response()->json(
            [
                'message'=>'joAd deleted succefully',
            ]
            );
    }
}
