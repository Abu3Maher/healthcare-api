<?php

namespace App\Models\Doctor\traits;

use App\Models\User\User;

trait DoctorShiftRelations
{
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
