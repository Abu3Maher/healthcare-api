<?php

use App\Http\Controllers\Constants\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::name('api.')->group(function () {

        Route::get('/user', UserController::class)->name('user');
    });
});
