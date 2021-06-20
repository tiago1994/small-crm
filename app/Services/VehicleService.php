<?php

namespace App\Services;

use App\Repositories\Eloquent\VehicleRepository;

class VehicleService
{
    protected $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function getAll()
    {
        return $this->vehicleRepository->getAll()->paginate(config('app.paginate_limit'));
    }

    public function find($id)
    {
        return $this->vehicleRepository->find($id);
    }

    public function save($request)
    {
        return $this->vehicleRepository->save($request);
    }

    public function delete($id)
    {
        return $this->vehicleRepository->delete($id);
    }

    public function play($id, $user, $date)
    {
        return $this->vehicleRepository->play($id, $user, $date);
    }

    public function stop($id, $date)
    {
        return $this->vehicleRepository->stop($id, $date);
    }
}
