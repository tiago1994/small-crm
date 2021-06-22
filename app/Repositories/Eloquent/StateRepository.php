<?php

namespace App\Repositories\Eloquent;

use App\Models\State;

class StateRepository extends Repository
{
    protected $state;

    public function __construct(State $state)
    {
        $this->state = $state;
    }

    public function getAll()
    {
        $cache_name = 'small-cmr.states';
        if ($this->checkCache($cache_name)) {
            return $this->fromCache($cache_name);
        }
        return $this->storeCache($cache_name, $this->state->with('cities'));
    }
}
