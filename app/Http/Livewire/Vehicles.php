<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Livewire\Component;

class Vehicles extends Component
{
    public $openModal = false;
    public $openDeleteModal = false;
    public $delete_vehicle_id;
    public $vehicle_id;
    public $name;

    public function render()
    {
        $vehicles = Vehicle::with(['history'])->get();
        return view('livewire.vehicles', ['vehicles' => $vehicles]);
    }

    public function stopVehicle($id)
    {
        Vehicle::find($id)->history()->update([
            'stop' => now()
        ]);
    }

    public function playVehicle($id)
    {
        Vehicle::find($id)->history()->create([
            'user_id' => auth()->user()->id,
            'start' => now()
        ]);
    }

    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        $this->vehicle_id = $vehicle->id;
        $this->name = $vehicle->name;
        $this->toggleAddModal();
    }

    public function save()
    {
        Vehicle::updateOrCreate(
            ['id' => $this->vehicle_id],
            ['name' => $this->name]
        );

        $this->cleanFields();
        $this->toggleAddModal();
    }

    public function toggleAddModal()
    {
        $this->openModal = !$this->openModal;
    }

    public function toggleDeleteModal($id = null)
    {
        $this->delete_vehicle_id = $id;
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function delete()
    {
        Vehicle::find($this->delete_vehicle_id)->delete();
        $this->openDeleteModal = !$this->openDeleteModal;
    }

    public function cleanFields()
    {
        $this->name = '';
        $this->delete_vehicle_id = '';
    }
}
