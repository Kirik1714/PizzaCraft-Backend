<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', App\Http\Controllers\Main\IndexController::class)->name('main.index');

Route::group(['prefix' => 'pizza'], function () {
    Route::get('/', App\Http\Controllers\Pizza\IndexController::class)->name('pizza.index');
    Route::get('/create', App\Http\Controllers\Pizza\CreateController::class)->name('pizza.create');
    Route::post('/', App\Http\Controllers\Pizza\StoreController::class)->name('pizza.store');
    // Route::get('/{pizza}/edit', App\Http\Controllers\Pizza\EditController::class)->name('pizza.edit');
    Route::get('/{pizza}', App\Http\Controllers\Pizza\ShowController::class)->name('pizza.show');
    Route::patch('/{pizza}', App\Http\Controllers\Pizza\UpdateController::class)->name('pizza.update');
    Route::delete('/{pizza}', App\Http\Controllers\Pizza\DeleteController::class)->name('pizza.destroy');
});

Route::group(['prefix' => 'orders'], function () {
    Route::get('/', App\Http\Controllers\Order\IndexController::class)->name('orders.index');
});