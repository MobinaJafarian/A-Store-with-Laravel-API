<?php

use App\Http\Controllers\Api\V1\AuthApiController;
use App\Http\Controllers\Api\V1\HomeApiController;
use App\Http\Controllers\Api\V1\ProductApiController;
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
    
    Route::get('/home',[HomeApiController::class, 'home']);

    Route::get('most_sold_products', [ProductApiController::class, 'most_sold_products']);
    Route::get('most_visited_products', [ProductApiController::class, 'most_visited_products']);
    Route::get('newest_products', [ProductApiController::class, 'newest_products']);
    Route::get('cheapets_products', [ProductApiController::class, 'cheapets_products']);
    Route::get('most_expensive_products', [ProductApiController::class, 'most_expensive_products']);
    
    Route::get('products_by_category/{id}', [ProductApiController::class, 'productsByCategory']);
    Route::get('products_by_brand/{id}', [ProductApiController::class, 'productsByBrand']);
    
    Route::get('product_detail/{id}', [ProductApiController::class, 'productDetail']);

    Route::post('search_product', [ProductApiController::class, 'searchProduct']);
});

Route::prefix('/v1')->namespace('Api\V1')->middleware('auth:sanctum')->group(function(){
    Route::post('register', [UserApiController::class, 'register']);

    Route::post('save_product_comment', [ProductApiController::class, 'saveComment']);

});