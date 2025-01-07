<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User\User;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::query()->create($data);
        if (in_array($user->role, ['admin', 'doctor'])) {

            return redirect()->back()->with('success', 'Registration successful! Your order is under review.');

        } elseif ($user->role == 'patient') {
            return redirect()->back()->with('success', 'Registration successful! Please check your email.');
        }
    }
}
