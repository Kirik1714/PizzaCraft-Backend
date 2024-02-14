<?php


use App\Http\Controllers\Api\Pizza\IndexController;
use App\Http\Controllers\Api\Pizza\ShowController;
use App\Http\Controllers\Api\User\OrderController;
use App\Http\Controllers\Api\User\StoreController;
use App\Http\Controllers\AuthController;

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

Route::group(['prefix' => 'pizza'], function () {
    Route::post('/', IndexController::class);
    Route::get('/{pizza}', ShowController::class);
    

    Route::group(['prefix' => 'orders'], function () {
        
        Route::post('/',OrderController::class);
        Route::get('/{id}',[OrderController::class,'getOrderByUser']);
    });

    
    
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);
});
Route::group(['prefix' => 'users'], function () {
    Route::post('/', StoreController::class);
});

