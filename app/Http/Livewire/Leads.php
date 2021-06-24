<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\StepService;

class Leads extends Component
{
    public $steps = [];

    public function mount(StepService $service){
        $this->steps = $service->getAvailable();
    }

    public function render()
    {
        return view('livewire.leads');
    }
}
