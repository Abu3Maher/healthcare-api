<?php

namespace App\Models\Appointment;


use App\Models\Appointment\traits\AppointmentRelations;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use AppointmentRelations;

    protected $table = 'appointments';

    protected $fillable = [
        'patient_id',
        'service_id',
        'doctor_id',
        'description',
        'status',
        'price',
        'duration',
        'booked_at',
//        'finished_at',
    ];

}
