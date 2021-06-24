<?php

namespace App\Repositories\Eloquent;

use App\Models\Step;

class StepRepository
{
    protected $model;

    public function __construct(Step $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->with('projects');
    }
}
