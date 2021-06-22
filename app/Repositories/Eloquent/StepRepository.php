<?php

namespace App\Repositories\Eloquent;

use App\Models\Step;

class StepRepository
{
    protected $step;

    public function __construct(Step $step)
    {
        $this->step = $step;
    }

    public function getAll()
    {
        return $this->step;
    }
}
