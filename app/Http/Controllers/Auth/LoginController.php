<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Enums\HttpStatus;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\LoginResource;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $data = $request->validated();

        if (auth('web')->attempt($data, true)) {
            $user = auth('web')->user();

            return response([
                'message' => 'Welcome, ' . $user->name,
                'code' => HttpStatus::OK,
                'data' => new LoginResource($user),
            ], HttpStatus::OK);
        }

        return response([
            'message' => 'Incorrect username or password. Please verify your credentials.',
            'code' => HttpStatus::BAD_REQUEST
        ], HttpStatus::BAD_REQUEST);
    }
}
