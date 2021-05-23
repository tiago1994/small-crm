<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Livewire\Component;

class VehiclesHistory extends Component
{
    public $vehicle_id = '';

    public function mount($id)
    {
        $this->vehicle_id = $id;
    }

    public function render()
    {
        $vehicle = Vehicle::find($this->vehicle_id);
        $histories = Vehicle::find($this->vehicle_id)->histories()->paginate(config('app.paginate_limit'));
        return view('livewire.vehicles-history', ['histories' => $histories, 'vehicle' => $vehicle]);
    }
}
