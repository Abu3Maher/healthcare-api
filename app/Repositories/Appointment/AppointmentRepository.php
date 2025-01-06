<?php

namespace App\Repositories\Appointment;


use App\Models\Appointment\Appointment;
use App\Models\Service\Service;
use App\Models\User\User;

class AppointmentRepository
{
    public function getAllAppointment()
    {
        $role = auth()->user()->role;

        return Appointment::query()
            ->when($role == 'doctor', function ($query) {
                $query->where('doctor_id', user_id());
            })
            ->when($role == 'patient', function ($query) {
                $query->where('patient_id', user_id());
            })
            ->get();
    }
}
