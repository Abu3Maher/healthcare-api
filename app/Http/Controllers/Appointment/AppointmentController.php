<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Appointment\CreateAppointmentRequest;
use App\Models\Appointment\Appointment;
use App\Repositories\Appointment\AppointmentRepository;
use App\Repositories\Doctor\DoctorRepository;
use App\Repositories\Service\ServiceRepository;

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

    public function store(CreateAppointmentRequest $request)
    {
        $data = $request->validated();
        data_set($data, 'patient_id', user_id());

        Appointment::query()
            ->create($data);

        return redirect()->back()->with('success', 'Appointment booked successfully');

    }

}
