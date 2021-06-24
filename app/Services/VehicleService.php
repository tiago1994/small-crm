<?php

namespace App\Services;

use App\Repositories\Eloquent\VehicleRepository;

class VehicleService
{
    protected $repository;

    public function __construct(VehicleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll()->paginate(config('app.paginate_limit'));
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function save($request)
    {
        return $this->repository->save($request);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function play($id, $user, $date)
    {
        return $this->repository->play($id, $user, $date);
    }

    public function stop($id, $date)
    {
        return $this->repository->stop($id, $date);
    }
}
