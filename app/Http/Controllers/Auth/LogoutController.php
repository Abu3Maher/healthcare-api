<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Enums\HttpStatus;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User\User;

class LogoutController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        auth('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
    }
}
