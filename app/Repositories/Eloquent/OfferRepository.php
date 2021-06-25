<?php

namespace App\Repositories\Eloquent;

use App\Models\Offer;

class OfferRepository
{

    protected $model;

    public function __construct(Offer $model)
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
                'title' => $request['title'],
                'file' => $request['file']
            ]
        );
    }
}
