<?php

namespace App\Repositories\Service;


use App\Models\Service\Service;

class ServiceRepository
{
    public function getAllServices()
    {
        return Service::query()
            ->get();
    }
}
