<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\CreateServiceRequest;
use App\Models\Service\Service;
use App\Repositories\Service\ServiceRepository;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(ServiceRepository $serviceRepo)
    {
        $services = $serviceRepo->getAllServices();

        return compact('services');
    }

    public function store(CreateServiceRequest $request)
    {
        $data = $request->validated();

        Service::query()->create($data);

        return redirect()->back()->with('success', 'Service created successfully');
    }
}
