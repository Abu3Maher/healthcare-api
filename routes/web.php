<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', LoginController::class)
    ->name('login');
