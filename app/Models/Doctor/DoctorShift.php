<?php

namespace App\Models\Doctor;


use App\Models\Doctor\traits\DoctorShiftRelations;
use Illuminate\Database\Eloquent\Model;

class DoctorShift extends Model
{
    use DoctorShiftRelations;

    protected $table = 'doctor_shifts';
    public $timestamps = false;
    
    protected $fillable = [
        'doctor_id',
        'day',
        'start_time',
        'end_time',
    ];

}
