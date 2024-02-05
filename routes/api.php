<?php

use App\Http\Controllers\Api\Filter\IndexController as FilterIndexController;
use App\Http\Controllers\Api\Pizza\IndexController;
use App\Http\Controllers\Api\Pizza\ShowController;
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

Route::group(['prefix'=>'pizza'],function(){
    Route::post('/',IndexController::class);
    Route::get('/{pizza}',ShowController::class);
    Route::get('/filters',FilterIndexController::class);

  
});