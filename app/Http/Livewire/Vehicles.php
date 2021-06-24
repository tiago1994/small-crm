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

    public function render(VehicleService $service)
    {
        return view('livewire.vehicles', ['vehicles' => $service->getAll()]);
    }

    public function playVehicle(VehicleService $service, $id)
    {
        $service->play($id, auth()->user()->id, now());
    }

    public function stopVehicle(VehicleService $service, $id)
    {
        $service->stop($id, now());
    }


    public function edit(VehicleService $service, $id)
    {
        $this->toggleAddModal();
        $this->vehicle = $service->find($id);
    }

    public function save(VehicleService $service)
    {
        $this->validate();
        $service->save(['id' => $this->vehicle->id, 'name' => $this->vehicle->name, 'code' => $this->vehicle->code]);
        $this->cleanFields();
        $this->toggleAddModal();
    }

    public function toggleAddModal()
    {
        $this->openModal = !$this->openModal;
        $this->cleanFields();
    }

    public function toggleDeleteModal(VehicleService $service, $id = null)
    {
        $this->vehicle = $service->find($id);
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function delete(VehicleService $service)
    {
        $service->delete($this->vehicle->id);
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function cleanFields()
    {
        $this->vehicle = new Vehicle;
    }
}
