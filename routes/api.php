<?php

use App\Http\Controllers\Constants\UserController;
use App\Http\Controllers\Service\ServiceController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::name('api.')->group(function () {

        Route::get('/user', UserController::class)->name('user');

        Route::name('services.')->prefix('/services/')->group([function () {
            Route::get('', [ServiceController::class, 'index'])->name('index');
        }]);
    });
});
