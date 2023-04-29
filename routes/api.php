<?php

use App\Http\Controllers\Api\V1\AuthApiController;
use App\Http\Controllers\Api\V1\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1')->namespace('Api\V1')->group(function(){
    Route::post('send_sms', [AuthApiController::class, 'sendSms']);
    Route::post('verify_sms_code',[AuthApiController::class, 'verifySms']);
});

Route::prefix('/v1')->namespace('Api\V1')->middleware('auth:sanctum')->group(function(){
    Route::post('register', [UserApiController::class, 'register']);
});