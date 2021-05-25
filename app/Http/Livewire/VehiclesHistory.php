<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleHistory;
use Livewire\Component;
use Carbon\Carbon;

class VehiclesHistory extends Component
{
    public $vehicle_id = '';
    public $search_user;
    public $search_date;

    public function mount($id)
    {
        $this->vehicle_id = $id;
    }

    public function render()
    {
        $vehicle = Vehicle::find($this->vehicle_id);
        $users = User::all();
        $histories = VehicleHistory::query();
        $histories = $histories->where('vehicle_id', $this->vehicle_id);

        if ($this->search_user) {
            $histories = $histories->where('user_id', $this->search_user);
        }

        if ($this->search_date) {
            $histories = $histories->whereDate('start', $this->search_date);
        }

        $histories = $histories->paginate(config('app.paginate_limit'));
        return view('livewire.vehicles-history', ['histories' => $histories, 'vehicle' => $vehicle, 'users' => $users]);
    }
}
