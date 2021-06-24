<?php

namespace App\Services;

use App\Repositories\Eloquent\StateRepository;

class StateService
{
    protected $repository;

    public function __construct(StateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }
}
