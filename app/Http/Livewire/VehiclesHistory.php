<?php

namespace App\Http\Livewire;

use App\Services\VehicleService;
use App\Services\VehicleHistoryService;
use App\Services\UserService;
use Livewire\Component;

class VehiclesHistory extends Component
{
    public $vehicle_id = '';
    public $search_user;
    public $search_date;

    public function mount($id)
    {
        $this->vehicle_id = $id;
    }

    public function render(VehicleService $vehicleService, VehicleHistoryService $vehicleHistoryService, UserService $userService)
    {
        return view('livewire.vehicles-history', [
            'histories' => $vehicleHistoryService->filterList($this->vehicle_id, $this->search_user, $this->search_date),
            'vehicle' => $vehicleService->find($this->vehicle_id),
            'users' => $userService->getAll()
        ]);
    }
}
