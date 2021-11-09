<?php

namespace App\Http\Livewire\Components;

use App\Models\FindUs;
use App\Services\StateService;
use App\Services\StepService;
use App\Services\ClientService;
use App\Services\UserService;
use App\Services\ProjectService;
use Livewire\Component;
use App\Models\Project;
use App\Models\ProjectImage;
use Livewire\WithFileUploads;

class LeadModal extends Component
{
    use WithFileUploads;

    public $open = false;
    public Project $project;
    public $users;
    public $clients;
    public $find_us;
    public $steps;
    public $add = true;

    public $states = [];
    public $files = [];
    public $state_id = "";
    public $cities = [];
    public $city_id = "";
    public $find_us_id = "";

    protected $rules = [
        'project.user_id' => 'required',
        'project.client_id' => 'required',
        'city_id' => 'required',
        'state_id' => 'required',
        'find_us_id' => 'required',
        'files' => 'sometimes',
        'project.step_id' => 'required',
        'project.title' => 'required',
        'project.description' => 'required',
        'project.cep' => 'required',
        'project.address' => 'required',
        'project.number' => 'required',
        'project.neighborhood' => 'required',
        'project.value' => 'sometimes',
        'project.comment_1' => 'sometimes',
        'project.comment_2' => 'sometimes',
        'project.comment_3' => 'sometimes',
        'project.comment_4' => 'sometimes',
        'project.comment_5' => 'sometimes',
        'project.comment_6' => 'sometimes',
    ];

    protected $listeners = ['openLeadModal'];

    public function mount(StateService $stateService, StepService $stepService, ClientService $clientService, UserService $userService, $add)
    {
        $this->users = $userService->getAll();
        $this->clients = $clientService->getAll();
        $this->steps = $stepService->getAll();
        $this->states = $stateService->getAll();
        $this->find_us = FindUs::all();
        $this->add = $add;
    }

    public function render()
    {
        return view('livewire.components.lead-modal');
    }

    public function save(ProjectService $service)
    {
        $this->validate();
        $response = $service->save([
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
            'value' => formatValue($this->project->value),
            'find_us_id' => $this->find_us_id,
            'comment_1' => $this->project->comment_1,
            'comment_2' => $this->project->comment_2,
            'comment_3' => $this->project->comment_3,
            'comment_4' => $this->project->comment_4,
            'comment_5' => $this->project->comment_5,
            'comment_6' => $this->project->comment_6
        ]);

        foreach($this->files as $file){
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/leads', $file_name);
            ProjectImage::create([
                'project_id' => $response->id,
                'file' => $file_name
            ]);
        }

        $this->closeModal();
        $this->emitUp('updateStepList');
        $this->emitUp('updateProjectsList');
    }

    public function openLeadModal(ProjectService $service, $id = null)
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->open = true;
        if($id != null){
            $this->project = $service->find($id);
            $this->project->value = number_format($this->project->value, 2, ',', '.');
            $this->state_id = $this->project->state_id;
            $this->updatedStateId();
            $this->city_id = $this->project->city_id;
            $this->find_us_id = $this->project->find_us_id;
        }else{
            $this->project = new Project;
            $this->state_id = "";
            $this->city_id = "";
            $this->find_us_id = "";
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

    public function removeFile($file){
        $this->project->files = $this->project->files->where('id', '!=', $file['id']);
        ProjectImage::find($file['id'])->delete();
    }
}
