<?php

namespace App\Services;

use App\Repositories\Eloquent\VehicleHistoryRepository;

class VehicleHistoryService
{
    protected $repository;

    public function __construct(VehicleHistoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function filterList($vehicle_id, $search_user, $search_date)
    {
        return $this->repository->filterList($vehicle_id, $search_user, $search_date);
    }
}
