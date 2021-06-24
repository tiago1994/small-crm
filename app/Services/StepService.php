<?php

namespace App\Services;

use App\Repositories\Eloquent\StepRepository;

class StepService
{
    protected $repository;

    public function __construct(StepRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll()->get();
    }
    
    public function getAvailable()
    {
        return $this->repository->getAll()->where('visible', 1)->get();
    }
}
