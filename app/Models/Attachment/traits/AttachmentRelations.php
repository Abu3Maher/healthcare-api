<?php

namespace App\Models\Attachment\traits;

use App\Models\Appointment\Appointment;

trait AttachmentRelations
{
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }
}
