<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\JobAdController;
use App\Http\Controllers\JwtAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('register',[JwtAuthController::class ,'register']);
Route::post('login',[JwtAuthController::class ,'login']);
Route::get('user',[JwtAuthController::class ,'getUser']);

Route::post('logout',[JwtAuthController::class ,'logout'])->middleware('jwtauth');

Route::apiResource('applications',ApplicationController::class);
Route::put('applications/withdraw/{id}',[ApplicationController::class,'withdrawApp']);

Route::apiResource('jobads',JobAdController::class);
