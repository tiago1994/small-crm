<?php

namespace App\Repositories\Eloquent;

use App\Models\Client;

class ClientRepository
{
    protected $model;

    public function __construct(Client $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->query();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function save($request)
    {
        return $this->model->updateOrCreate(
            ['id' => $request['id']],
            [
                'name' => $request['name'],
                'email' => $request['email'],
                'cpf' => $request['cpf'],
                'phone' => $request['phone'],
                'whatsapp' => $request['whatsapp']
            ]
        );
    }
}
