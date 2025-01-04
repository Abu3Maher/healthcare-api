<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Enums\HttpStatus;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User\User;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $data = $request->validated();
        User::query()->create($data);


        return response([
            'message' => 'Registration successful! Your order is under review.',
            'code' => HttpStatus::OK
        ], HttpStatus::OK);
    }
}
