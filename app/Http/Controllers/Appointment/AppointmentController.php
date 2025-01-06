<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment\Appointment;
use App\Repositories\Appointment\AppointmentRepository;
use App\Repositories\Doctor\DoctorRepository;
use App\Repositories\Service\ServiceRepository;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(AppointmentRepository $appointmentRepo)
    {
        $appointments = $appointmentRepo->getAllAppointment();

        return compact('appointments');
    }

    public function create(DoctorRepository  $doctorRepo,
                           ServiceRepository $serviceRepo)
    {
        $doctors = $doctorRepo->getAllDoctors();
        $services = $serviceRepo->getAllServices();

        return compact('doctors', 'services');
    }

}
