<?php

namespace App\Services;

use App\Repositories\Eloquent\StateRepository;

class StateService
{
    protected $stateRepository;

    public function __construct(StateRepository $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }

    public function getAll()
    {
        return $this->stateRepository->getAll();
    }
}
