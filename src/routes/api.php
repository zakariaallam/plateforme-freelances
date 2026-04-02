<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FreelanceresController;
use App\Http\Controllers\MissionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::put('profile/freelance',[FreelanceresController::class,'profile'])->middleware('auth:api');
Route::put('profile/client',[ClientController::class,'profile'])->middleware('auth:api');

Route::post('mission',[MissionController::class,'store'])->middleware('auth:api');