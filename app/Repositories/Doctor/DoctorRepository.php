<?php

namespace App\Repositories\Doctor;


use App\Models\Service\Service;
use App\Models\User\User;

class DoctorRepository
{
    public function getDoctorById($id)
    {
        return User::query()
            ->where('id', '=', $id)
            ->where('role', '=','doctor')
            ->firstOrFail();
    }

    public function getAllDoctors()
    {
        return User::query()
            ->where('role', '=', 'doctor')
            ->get();
    }
}
