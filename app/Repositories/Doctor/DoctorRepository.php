<?php

namespace App\Repositories\Doctor;


use App\Models\Service\Service;
use App\Models\User\User;

class DoctorRepository
{
    public function getAllDoctors()
    {
        return User::query()
            ->where('role', '=', 'doctor')
            ->get();
    }
}
