<?php

namespace App\Http\Livewire\Components;

use App\Services\StateService;
use App\Services\StepService;
use App\Services\ClientService;
use App\Services\UserService;
use App\Services\ProjectService;
use Livewire\Component;
use App\Models\Project;
use Livewire\WithFileUploads;

class LeadModal extends Component
{
    use WithFileUploads;

    public $open = false;
    public Project $project;
    public $users;
    public $clients;
    public $steps;
    public $add = true;

    public $states = [];
    public $files = [];
    public $state_id = "";
    public $cities = [];
    public $city_id = "";

    protected $rules = [
        'project.user_id' => 'required',
        'project.client_id' => 'required',
        'city_id' => 'required',
        'state_id' => 'required',
        'files' => 'sometimes',
        'project.step_id' => 'required',
        'project.title' => 'required',
        'project.description' => 'required',
        'project.cep' => 'required',
        'project.address' => 'required',
        'project.number' => 'required',
        'project.neighborhood' => 'required',
        'project.value' => 'sometimes'
    ];

    protected $listeners = ['openLeadModal'];

    public function mount(StateService $stateService, StepService $stepService, ClientService $clientService, UserService $userService, $add)
    {
        $this->users = $userService->getAll();
        $this->clients = $clientService->getAll();
        $this->steps = $stepService->getAll();
        $this->states = $stateService->getAll();
        $this->add = $add;
    }

    public function render()
    {
        return view('livewire.components.lead-modal');
    }

    public function save(ProjectService $service)
    {
        $this->validate();
        $service->save([
            'id' => $this->project->id,
            'user_id' => $this->project->user_id, 
            'client_id' => $this->project->client_id, 
            'city_id' => $this->city_id, 
            'state_id' => $this->state_id, 
            'step_id' => $this->project->step_id, 
            'title' => $this->project->title, 
            'description' => $this->project->description, 
            'cep' => $this->project->cep, 
            'address' => $this->project->address, 
            'number' => $this->project->number, 
            'neighborhood' => $this->project->neighborhood, 
            'value' => formatValue($this->project->value)
        ]);

        foreach($this->files as $file){
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $this->file->storeAs('public/leads', $file_name);
        }

        $this->closeModal();
        $this->emitUp('updateStepList');
        $this->emitUp('updateProjectsList');
    }

    public function openLeadModal(ProjectService $service, $id = null)
    {
        $this->open = true;
        if($id != null){
            $this->project = $service->find($id);
            $this->project->value = number_format($this->project->value, 2, ',', '.');
            $this->state_id = $this->project->state_id;
            $this->updatedStateId();
            $this->city_id = $this->project->city_id;
        }else{
            $this->project = new Project;
        }
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
