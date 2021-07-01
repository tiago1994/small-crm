<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use App\Services\VehicleService;
use App\Services\UserService;
use App\Models\Vehicle;
use Livewire\Component;

class Vehicles extends Component
{
    public Vehicle $vehicle;
    public $openModal = false;
    public $openDeleteModal = false;
    public $modalConfirm = false;
    public $users = [];
    public $user_selected;
    public $password;
    public $vehicle_id;

    protected $rules = [
        'vehicle.name' => 'required',
        'vehicle.code' => 'string'
    ];

    public function mount(UserService $service)
    {
        $this->vehicle = new Vehicle();
        $this->users = $service->getAll();
    }

    public function render(VehicleService $service)
    {
        return view('livewire.vehicles', ['vehicles' => $service->getAll()]);
    }

    public function play($id)
    {
        $this->cleanFields();
        $this->resetValidation();
        
        $this->modalConfirm = !$this->modalConfirm;
        $this->vehicle_id = $id;
    }

    public function toggleUseVehicle(){
        $this->modalConfirm = !$this->modalConfirm;
        $this->vehicle_id = '';
    }

    public function checkPassword(UserService $service, VehicleService $vehicleService){
        $this->validate([
            'user_selected' => 'required',
            'password' => 'required'
        ]);

        $user = $service->find($this->user_selected);
        if (!Hash::check($this->password, $user->password)) {
            return $this->addError('password', 'Senha inválida.');
        }
        $vehicleService->play($this->vehicle_id, $user->id, now());
        $this->toggleUseVehicle();
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
        $this->user_selected = '';
        $this->password = '';
        $this->vehicle_id = '';
    }
}
