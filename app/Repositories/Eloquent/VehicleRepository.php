<?php

namespace App\Repositories\Eloquent;

use App\Models\Vehicle;

class VehicleRepository
{

    protected $model;

    public function __construct(Vehicle $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->with('history');
    }

    public function save($request)
    {
        return $this->model->updateOrCreate(
            ['id' => $request['id']],
            ['name' => $request['name'], 'code' => $request['code']]
        );
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function delete($id)
    {
        $this->model->find($id)->history()->delete();
        return $this->model->find($id)->delete();
    }

    public function play($id, $user, $date)
    {
        $this->model->find($id)->history()->create(['user_id' => $user, 'start' => $date]);
    }

    public function stop($id, $date)
    {
        $this->model->find($id)->history()->update(['stop' => $date]);
    }
}
