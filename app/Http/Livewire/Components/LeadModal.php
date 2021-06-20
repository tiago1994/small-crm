<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Project;
use App\Models\User;
use App\Models\Client;
use App\Models\Step;

class LeadModal extends Component
{
    public $open = false;
    public Project $project;
    public $users;
    public $clients;
    public $steps;

    public function mount(){
        $this->users = User::all();
        $this->clients = Client::all();
        $this->steps = Step::all();
    }

    public function render()
    {
        return view('livewire.components.lead-modal');
    }

    public function save(){

    }

    public function openModal()
    {
        $this->open = true;
    }

    public function closeModal()
    {
        $this->open = false;
    }
}
