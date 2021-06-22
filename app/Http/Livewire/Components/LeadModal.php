<?php

namespace App\Http\Livewire\Components;

use App\Services\StateService;
use App\Services\StepService;
use App\Services\ClientService;
use App\Services\UserService;
use Livewire\Component;
use App\Models\Project;
class LeadModal extends Component
{
    public $open = false;
    public Project $project;
    public $users;
    public $clients;
    public $steps;

    public $states = [];
    public $state_id = "";
    public $cities = [];
    public $city_id = "";

    public function mount(StateService $stateService, StepService $stepService, ClientService $clientService, UserService $userService)
    {
        $this->users = $userService->getAll();
        $this->clients = $clientService->getAll();
        $this->steps = $stepService->getAll();
        $this->states = $stateService->getAll();
    }

    public function render()
    {
        return view('livewire.components.lead-modal');
    }

    public function save()
    {
    }

    public function openModal()
    {
        $this->open = true;
    }

    public function closeModal()
    {
        $this->open = false;
    }

    public function updatedStateId()
    {
        if (empty($this->state_id)) {
            $this->city_id = "";
            $this->cities = [];
            return;
        }

        $this->cities = $this->states->firstWhere('id', $this->state_id)['cities'];
    }
}
