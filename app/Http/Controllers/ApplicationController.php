<?php

namespace App\Http\Controllers;

use App\Services\ApplicationService;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    protected $appRepos;
    
    public function __construct(ApplicationService $appRepos)
    {
        $this->appRepos = $appRepos;
    }

    public function index(){

        $applications = $this->appRepos->getAllApplications();

        return response()->json(
            [
                'applications'=>$applications
            ]
            );
    }

    public function store(Request $request){

        $application = $this->appRepos->createApp($request);

        return response()->json([
            'application'=>$application
        ]);
    }
}
