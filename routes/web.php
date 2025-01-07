<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Appointment\AppointmentController;
use App\Http\Controllers\Constants\UserController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Service\ServiceController;
use Illuminate\Support\Facades\Route;

Route::name('auth.')->prefix('/auth/')->group(function () {

    Route::post('login', LoginController::class)
        ->name('login');

    Route::post('register', RegisterController::class)
        ->name('register');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::name('api.')->prefix('/api/')->group(function () {

        Route::get('/user', UserController::class)->name('user');

        Route::name('services.')->prefix('services/')->group([function () {
            Route::get('', [ServiceController::class, 'index'])->name('index');
            Route::post('store', [ServiceController::class, 'store'])->name('store');
            Route::get('{id}/edit', [ServiceController::class, 'edit'])->name('edit');
            Route::post('{id}/update', [ServiceController::class, 'update'])->name('update');
            Route::delete('{id}/delete', [ServiceController::class, 'delete'])->name('delete');

        }]);

        Route::name('doctors.')->prefix('doctors/')->group(function () {
            Route::get('', [DoctorController::class, 'index'])->name('index');
            Route::get('{id}/edit', [DoctorController::class, 'edit'])->name('edit');
            Route::post('{id}/update', [DoctorController::class, 'update'])->name('update');

        });

        Route::name('appointments.')->prefix('appointments/')->group(function () {
            Route::get('', [AppointmentController::class, 'index'])->name('index');
            Route::get('create', [AppointmentController::class, 'create'])->name('create');
            Route::post('store', [AppointmentController::class, 'store'])->name('store');
            Route::post('{id}/update', [AppointmentController::class, 'update'])->name('update');

        });
    });
});
