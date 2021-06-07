<?php

namespace App\Repositories\Eloquent;

use App\Models\VehicleHistory;

class VehicleHistoryRepository
{
    protected $vehicleHistory;

    public function __construct(VehicleHistory $vehicleHistory)
    {
        $this->vehicleHistory = $vehicleHistory;
    }

    public function filterList($vehicle_id, $search_user, $search_date)
    {
        $histories = $this->vehicleHistory->query();
        $histories = $histories->where('vehicle_id', $vehicle_id);

        if ($search_user) {
            $histories = $histories->where('user_id', $search_user);
        }

        if ($search_date) {
            $histories = $histories->whereDate('start', $search_date);
        }

        return $histories->paginate(config('app.paginate_limit'));
    }
}
