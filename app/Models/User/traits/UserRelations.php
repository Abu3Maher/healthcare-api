<?php

namespace App\Models\User\traits;

use App\Models\Appointment\Appointment;
use App\Models\Doctor\DoctorShift;
use App\Models\Service\Service;

trait UserRelations
{
    public function shifts()
    {
        return $this->hasMany(DoctorShift::class, 'doctor_id');
    }

    public function doctorAppointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public function patientAppointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'doctor_service', 'doctor_id', 'service_id');
    }

}
