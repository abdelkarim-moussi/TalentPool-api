<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\JobAdController;
use App\Http\Controllers\JwtAuthController;
use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Route;


Route::post('register',[JwtAuthController::class ,'register']);
Route::post('login',[JwtAuthController::class ,'login']);
Route::get('user',[JwtAuthController::class ,'getUser']);

Route::post('logout',[JwtAuthController::class ,'logout'])->middleware('jwtauth');
Route::patch('update_password',[JwtAuthController::class ,'updatePassword'])->middleware('jwtauth');

Route::get('jobads',[JobAdController::class,'index']);
Route::get('jobads/{id}',[JobAdController::class,'show']);

Route::patch('applications/updatestatus/{id}',[ApplicationController::class,'updateStatus'])->middleware('jwtauth');

Route::middleware(['jwtauth'])->group(function(){
    Route::apiResource('applications',ApplicationController::class);
    Route::put('applications/withdraw/{id}',[ApplicationController::class,'withdrawApp']);
    Route::apiResource('jobads',JobAdController::class)->except(['index','show']);

    Route::get('statistics/jobads_statistics',[StatisticsController::class,'jobAdStatistics']);
    Route::get('statistics/applications_statistics',[StatisticsController::class,'applicationsStatistics']);

});

