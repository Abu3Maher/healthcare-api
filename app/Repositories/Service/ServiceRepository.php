<?php

namespace App\Repositories\Service;


use App\Models\Service\Service;

class ServiceRepository
{
    public function getServiceById($id)
    {
        return Service::query()
            ->where('id', '=', $id)
            ->firstOrFail();
    }

    public function getAllServices()
    {
        return Service::query()
            ->get();
    }
}
