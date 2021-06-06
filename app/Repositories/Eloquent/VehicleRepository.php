<?php

namespace App\Repositories\Eloquent;

use App\Models\Vehicle;

class VehicleRepository
{

    protected $vehicle;

    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function getAll()
    {
        return $this->vehicle->with('history')->get();
    }

    public function save($request)
    {
        return $this->vehicle->updateOrCreate(
            ['id' => $request['id']],
            ['name' => $request['name'], 'code' => $request['code']]
        );
    }

    public function find($id)
    {
        return $this->vehicle->find($id);
    }

    public function delete($id)
    {
        $this->vehicle->find($id)->history()->delete();
        return $this->vehicle->find($id)->delete();
    }

    public function play($id, $user, $date)
    {
        $this->vehicle->find($id)->history()->create(['user_id' => $user, 'start' => $date]);
    }

    public function stop($id, $date)
    {
        $this->vehicle->find($id)->history()->update(['stop' => $date]);
    }
}
