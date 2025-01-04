<?php

namespace App\Models\Appointment\traits;

use App\Models\Service\Service;
use App\Models\User\User;

trait AppointmentRelations
{
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'appointment_id');
    }

}
