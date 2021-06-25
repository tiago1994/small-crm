<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\StepService;

class Leads extends Component
{
    public $steps = [];

    protected $listeners = ['updateStepList'];

    public function mount(StepService $service)
    {
        $this->steps = $service->getAvailable();
    }

    public function render()
    {
        return view('livewire.leads');
    }

    public function updateStepList(StepService $service){
        $this->steps = $service->getAvailable();
    }

    public function openModal($id){
        $this->emit('openLeadModal', $id);
    }
}
