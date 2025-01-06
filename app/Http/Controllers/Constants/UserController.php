<?php

namespace App\Http\Controllers\Constants;

use App\Http\Controllers\Controller;
use App\Http\Enums\HttpStatus;
use App\Http\Resources\Auth\LoginResource;

class UserController extends Controller
{
    public function __invoke()
    {
        $user = auth('web')->user();

        return response([
            'code' => HttpStatus::OK,
            'message' => 'Successful operation',
            'data' => new LoginResource($user)
        ], HttpStatus::OK);
    }
}
