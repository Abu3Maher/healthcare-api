<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\UpdateDoctorRequest;
use App\Repositories\Doctor\DoctorRepository;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(DoctorRepository $doctorRepo)
    {
        $doctors = $doctorRepo->getAllDoctors();

        return compact('doctors');
    }

    public function edit(DoctorRepository $doctorRepo, $id)
    {
        $doctor = $doctorRepo->getDoctorById($id);

        return compact('doctor');
    }

    public function update(UpdateDoctorRequest $request,
                           DoctorRepository    $doctorRepo, $id)
    {
        $data = $request->validated();

        $doctor = $doctorRepo->getDoctorById($id);
        $doctor->update($data);
        $doctor->services()->sync($data['services']);

        foreach ($data['days'] as $day) {
            $doctor->shifts()->attach([
                'day' => $day,
                'start_time' => $data['start_time'],
                'end_time' => $data['end_time']
            ]);
        }

        return redirect()->back()->with('success', 'Doctor updated successfully');
    }
}
