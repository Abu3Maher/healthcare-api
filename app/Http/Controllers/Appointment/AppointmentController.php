<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment\Appointment;
use App\Repositories\Appointment\AppointmentRepository;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(AppointmentRepository $appointmentRepo)
    {
        $appointments = $appointmentRepo->getAllAppointment();

        return compact('appointments');
    }

}
