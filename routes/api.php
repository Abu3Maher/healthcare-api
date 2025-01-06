<?php

use App\Http\Controllers\Appointment\AppointmentController;
use App\Http\Controllers\Constants\UserController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Service\ServiceController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
