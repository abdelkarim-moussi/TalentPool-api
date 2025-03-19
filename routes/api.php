<?php

use App\Http\Controllers\JwtAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('register',[JwtAuthController::class ,'register']);
