<?php

namespace App\Http\Controllers;

use App\Models\JobAd;
use App\Services\JobAdService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\Routing\Loader\Configurator\ImportConfigurator;
use Tymon\JWTAuth\Facades\JWTAuth;

use function PHPUnit\Framework\returnSelf;

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

    public function show($id){
        
        $jobAd = $this->jobAdService->findJobAdById($id);

        if(! $jobAd){
            abort(404,'jobAd not found');
        }
        
        return response()->json(compact('jobAd'));

    }


    public function store(Request $request){

        $jobAd = $this->jobAdService->createJobAdd($request);

        return response()->json(compact('jobAd'));
        
    }

    public function update($id,Request $request){

       $jobAd = $this->jobAdService->updateJobAd($id,$request);

        return response()->json(
            [
                'message'=>'your jobAd updated succefully',
                'jobAd'=>$jobAd
            ]
            );

    }

    public function destroy($id){

        $jobAd = $this->jobAdService->deleteJobAd($id);

        return response()->json(
            [
                $this->jobAdService->deleteJobAd($id)
            ]
            );
    }
}
