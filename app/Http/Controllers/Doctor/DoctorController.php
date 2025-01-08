<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\UpdateDoctorRequest;
use App\Repositories\Doctor\DoctorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 


class DoctorController extends Controller
{
    public function index(DoctorRepository $doctorRepo)
    {
        $this->logRequestedRoute();
        $doctors = $doctorRepo->getAllDoctors();

        return compact('doctors');
    }

    public function edit(DoctorRepository $doctorRepo, $id)
    {
        $this->logRequestedRoute();
        $doctor = $doctorRepo->getDoctorById($id);

        return compact('doctor');
    }

    public function update(UpdateDoctorRequest $request,
                           DoctorRepository    $doctorRepo, $id)
    {
        $this->logRequestedRoute();
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

    // heleper methods 
    private function logRequestedRoute()
    {
        // Get the current request instance
        $request = request();

        // Log the requested route information
        Log::info('Requested Route:', [ // Use the imported Log facade
            'method' => $request->method(),
            'url'    => $request->fullUrl(),
            'route'  => $request->route()->getName(),
            'ip'     => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);
    }
}
