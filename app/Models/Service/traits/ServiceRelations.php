<?php

namespace App\Models\Service\traits;

use App\Models\User\User;

trait ServiceRelations
{
    public function doctors()
    {
        return $this->belongsToMany(User::class, 'doctor_service', 'service_id', 'doctor_id');
    }
}
