<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\JobAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Tymon\JWTAuth\Facades\JWTAuth;

class StatisticsController extends Controller
{
    

    public function jobAdStatistics(){

        if(Gate::denies('statistics')){

            abort(403,'you are not allowed to view statistics');
        }

        $totalAds = JobAd::where('recruiter_id','=',JWTAuth::user()->id)->with('applications')->count();

        $jobAdApp = DB::table('job_ads')
        ->select('job_ads.title', DB::raw('COUNT(applications.id) as applications_count'))
        ->join('applications', 'job_ads.id', '=', 'applications.jobad_id')
        ->groupBy(
            'job_ads.id',
            'job_ads.title',
            'job_ads.description',
            'job_ads.recruiter_id',
            'job_ads.salaryRange',
            'job_ads.location',
            'job_ads.created_at',
            'job_ads.updated_at'
        )
        ->having('job_ads.recruiter_id','=',JWTAuth::user()->id)
        ->get();

        return response()->json(
            [
                'total jobAds'=>$totalAds,
                'jobAd applications'=>$jobAdApp
            ]
            );
    }


    public function applicationsStatistics()
    {
        if(Gate::denies('statistics')){

            abort(403,'you are not allowed to view statistics');
        }

        $appsJob = DB::table('job_ads')
        ->select('job_ads.title', DB::raw('COUNT(applications.id) as applications_count'))
        ->join('applications', 'job_ads.id', '=', 'applications.jobad_id')
        ->groupBy(
            'job_ads.id',
            'job_ads.title',
            'job_ads.description',
            'job_ads.recruiter_id',
            'job_ads.salaryRange',
            'job_ads.location',
            'job_ads.created_at',
            'job_ads.updated_at'
        )
        ->having('job_ads.recruiter_id','=',JWTAuth::user()->id)
        ->count();

        $pendingApps = DB::table('applications')->join('job_ads','applications.jobad_id','=','job_ads.id')->where('status','pending')->where('job_ads.recruiter_id',JWTAuth::user()->id)->count();
        $acceptedApps = DB::table('applications')->join('job_ads','applications.jobad_id','=','job_ads.id')->where('status','accepted')->where('job_ads.recruiter_id',JWTAuth::user()->id)->count();
        $receiveddApps = DB::table('applications')->join('job_ads','applications.jobad_id','=','job_ads.id')->where('status','received')->where('job_ads.recruiter_id',JWTAuth::user()->id)->count();
        $refusedApps = DB::table('applications')->join('job_ads','applications.jobad_id','=','job_ads.id')->where('status','refused')->where('job_ads.recruiter_id',JWTAuth::user()->id)->count();
        $withdrawedApps = DB::table('applications')->join('job_ads','applications.jobad_id','=','job_ads.id')->where('status','withdrawed')->where('job_ads.recruiter_id',JWTAuth::user()->id)->count();
        $inInterviewApps = DB::table('applications')->join('job_ads','applications.jobad_id','=','job_ads.id')->where('status','in_interview')->where('job_ads.recruiter_id',JWTAuth::user()->id)->count();
        $doneApps = DB::table('applications')->join('job_ads','applications.jobad_id','=','job_ads.id')->where('status','done')->where('jobad_id',JWTAuth::user()->id)->count();

        return response()->json(
            [
                'applications per job add'=>$appsJob,
                'pending applications'=>$pendingApps,
                'received applications'=>$receiveddApps,
                'accepted application'=>$acceptedApps,
                'refused applications'=>$refusedApps,
                'withdrawed applications'=>$withdrawedApps,
                'in Interview applications'=>$inInterviewApps,
                'done applications'=>$doneApps
            ]
            );


    }

}
