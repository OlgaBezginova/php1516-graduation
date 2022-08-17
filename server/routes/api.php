<?php

use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\UserAuthApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    Route::post('/login', [UserAuthApiController::class, 'login']);

    Route::get('/products', [ProductApiController::class, 'products']);
    Route::get('/products/{product_id}', [ProductApiController::class, 'product']);

    Route::middleware('auth.api')->group(function(){
        Route::get('/orders', [OrderApiController::class, 'orders']);
        Route::get('/order/{order_id}', [OrderApiController::class, 'order']);
        Route::put('/orders', [OrderApiController::class, 'create']);
    });









