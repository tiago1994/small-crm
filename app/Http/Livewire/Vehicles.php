<?php

namespace App\Http\Livewire;

use App\Services\VehicleService;
use App\Models\Vehicle;
use Livewire\Component;

class Vehicles extends Component
{
    public Vehicle $vehicle;
    public $openModal = false;
    public $openDeleteModal = false;

    protected $rules = [
        'vehicle.name' => 'required',
        'vehicle.code' => 'string'
    ];

    public function mount()
    {
        $this->vehicle = new Vehicle();
    }

    public function render(VehicleService $vehicleService)
    {
        return view('livewire.vehicles', ['vehicles' => $vehicleService->getAll()]);
    }

    public function playVehicle(VehicleService $vehicleService, $id)
    {
        $vehicleService->play($id, auth()->user()->id, now());
    }

    public function stopVehicle(VehicleService $vehicleService, $id)
    {
        $vehicleService->stop($id, now());
    }


    public function edit(VehicleService $vehicleService, $id)
    {
        $this->toggleAddModal();
        $this->vehicle = $vehicleService->find($id);
    }

    public function save(VehicleService $vehicleService)
    {
        $this->validate();
        $vehicleService->save(['id' => $this->vehicle->id, 'name' => $this->vehicle->name, 'code' => $this->vehicle->code]);
        $this->cleanFields();
        $this->toggleAddModal();
    }

    public function toggleAddModal()
    {
        $this->openModal = !$this->openModal;
        $this->cleanFields();
    }

    public function toggleDeleteModal(VehicleService $vehicleService, $id = null)
    {
        $this->vehicle = $vehicleService->find($id);
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function delete(VehicleService $vehicleService)
    {
        $vehicleService->delete($this->vehicle->id);
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function cleanFields()
    {
        $this->vehicle = new Vehicle;
    }
}
