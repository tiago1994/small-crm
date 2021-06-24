<?php

namespace App\Repositories\Eloquent;

use App\Models\State;

class StateRepository extends Repository
{
    protected $model;

    public function __construct(State $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $cache_name = 'small-cmr.states';
        if ($this->checkCache($cache_name)) {
            return $this->fromCache($cache_name);
        }
        return $this->storeCache($cache_name, $this->model->with('cities'));
    }
}
