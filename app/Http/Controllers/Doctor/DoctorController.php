<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Repositories\Doctor\DoctorRepository;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(DoctorRepository $doctorRepo)
    {
        $doctors = $doctorRepo->getAllDoctors();

        return compact('doctors');
    }
}
