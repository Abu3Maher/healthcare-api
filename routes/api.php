<?php

use App\Http\Controllers\Constants\UserController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Service\ServiceController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::name('api.')->group(function () {

        Route::get('/user', UserController::class)->name('user');

        Route::name('services.')->prefix('/services/')->group([function () {
            Route::get('', [ServiceController::class, 'index'])->name('index');
            Route::post('store', [ServiceController::class, 'store'])->name('store');
            Route::get('{id}/edit', [ServiceController::class, 'edit'])->name('edit');
            Route::post('{id}/update', [ServiceController::class, 'update'])->name('update');
            Route::delete('{id}/delete', [ServiceController::class, 'delete'])->name('delete');

        }]);

        Route::name('doctors.')->prefix('/doctors/')->group(function () {
            Route::get('', [DoctorController::class, 'index'])->name('index');

        });
    });
});
