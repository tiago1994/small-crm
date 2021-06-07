<?php

namespace App\Services;

use App\Repositories\Eloquent\VehicleHistoryRepository;

class VehicleHistoryService
{
    protected $vehicleHistoryRepository;

    public function __construct(VehicleHistoryRepository $vehicleHistoryRepository)
    {
        $this->vehicleHistoryRepository = $vehicleHistoryRepository;
    }

    public function filterList($vehicle_id, $search_user, $search_date)
    {
        return $this->vehicleHistoryRepository->filterList($vehicle_id, $search_user, $search_date);
    }
}
