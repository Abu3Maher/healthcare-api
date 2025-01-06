<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\CreateServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;
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

    public function edit(ServiceRepository $serviceRepo, $id)
    {
        $service = $serviceRepo->getServiceById($id);

        return compact('service');
    }

    public function update(UpdateServiceRequest $request,
                           ServiceRepository    $serviceRepo, $id)
    {
        $data = $request->validated();

        $service = $serviceRepo->getServiceById($id);
        $service->update($data);

        return redirect()->back()->with('success', 'Service updated successfully');
    }

    public function delete(ServiceRepository $serviceRepo, $id)
    {

        $service = $serviceRepo->getServiceById($id);
        $service->delete();

        return redirect()->back()->with('success', 'Service deleted successfully');
    }
}
