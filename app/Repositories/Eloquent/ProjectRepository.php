<?php

namespace App\Repositories\Eloquent;

use App\Models\Project;

class ProjectRepository
{

    protected $model;

    public function __construct(Project $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->query();
    }
    
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
    
    public function find($id)
    {
        return $this->model->find($id);
    }

    public function save($request)
    {
        return $this->model->updateOrCreate(
            ['id' => $request['id']],
            [
                'user_id' => $request['user_id'],
                'client_id' => $request['client_id'],
                'city_id' => $request['city_id'],
                'state_id' => $request['state_id'],
                'step_id' => $request['step_id'],
                'title' => $request['title'],
                'description' => $request['description'],
                'cep' => $request['cep'],
                'address' => $request['address'],
                'number' => $request['number'],
                'neighborhood' => $request['neighborhood'],
                'value' => $request['value']
            ]
        );
    }
}
