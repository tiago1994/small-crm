<?php

namespace App\Services;

use App\Repositories\Eloquent\StepRepository;

class StepService
{
    protected $stepRepository;

    public function __construct(StepRepository $stepRepository)
    {
        $this->stepRepository = $stepRepository;
    }

    public function getAll()
    {
        return $this->stepRepository->getAll()->get();
    }
}
