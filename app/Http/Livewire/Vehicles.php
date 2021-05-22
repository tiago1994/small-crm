<?php

namespace App\Http\Livewire;

use App\Models\Vehicle;
use Livewire\Component;

class Vehicles extends Component
{
    public function render()
    {
        $vehicles = Vehicle::all();
        return view('livewire.vehicles', ['vehicles' => $vehicles]);
    }
}
