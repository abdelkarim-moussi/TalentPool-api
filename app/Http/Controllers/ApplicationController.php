<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Services\ApplicationService;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    protected $appService;
    
    public function __construct(ApplicationService $appService)
    {
        $this->appService = $appService;
    }

    public function index(){

        $applications = $this->appService->getAllApplications();

        return response()->json(
            [
                'applications'=>$applications
            ]
            );
    }

    public function show(Application $application){
        return response()->json(
            [
                'application'=>$this->appService->findApplicationById($application->id)
            ]
            );
    }

    public function store(Request $request){

        $application = $this->appService->createApplication($request);

        return response()->json([
            'application'=>$application
        ]);
    }

    public function update(Application $application,Request $request){

        return response()->json(
            [
                'message'=>'application updated succefully',
                'application'=>$this->appService->updateApplication($application->id,$request)
            ]
            );
    }

    public function destroy(Application $application){
                
        return response()->json(
            [
                'message'=>'application deleted succefully',
                'application'=> $application
            ]
            );
    }
}
