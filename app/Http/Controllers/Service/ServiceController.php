<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Repositories\Service\ServiceRepository;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(ServiceRepository $serviceRepo)
    {
        $services = $serviceRepo->getAllServices();

        return compact('services');
    }
}
