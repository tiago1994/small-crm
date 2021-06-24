<?php

namespace App\Repositories\Eloquent;

use App\Models\Provider;

class ProviderRepository
{

    protected $model;

    public function __construct(Provider $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model;
    }

    public function save($request)
    {
        return $this->model->updateOrCreate(
            ['id' => $request['id']],
            [
                'company' => $request['company'], 
                'name' => $request['name'], 
                'email' => $request['email'],
                'phone' => $request['phone']
            ]
        );
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}
